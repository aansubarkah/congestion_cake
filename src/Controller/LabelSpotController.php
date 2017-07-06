<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
use Cake\Datasource\ConnectionManager;

/**
 * LabelSpot Controller
 *
 * @property \App\Model\Table\LabelSpotTable $LabelSpot
 *
 * @method \App\Model\Entity\LabelSpot[] paginate($object = null, array $settings = [])
 */
class LabelSpotController extends AppController
{
    public $title = 'Spoting';
    public $limit = 5;

    //public $helpers = ['ElasticSearch.ClientBuilder'];

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['label-spot', 'Spoting']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        /*$allRaw = null;
        $allPlace = null;
        $allCondition = null;
        $allWeather = null;
        if ($this->request->is('post'))
        {
            $allRaw = explode(',', $this->request->getData('all_raw'));
            $allPlace = explode(',', $this->request->getData('all_place'));
            $allCondition = explode(',', $this->request->getData('all_condition'));
            $allWeather = explode(',', $this->request->getData('all_weather'));

            if (count($allRaw) == count($allPlace) && count($allRaw) == count($allCondition) && count($allRaw) == count($allWeather))
            {
                $data = [];
                for ($i=0; $i<count($allRaw); $i++)
                {
                    array_push($data, [
                        'raw_id' => $allRaw[$i],
                        'user_id' => 1,
                        'place' => $allPlace[$i],
                        'condition' => $allCondition[$i],
                        'weather' => $allWeather[$i],
                        'trained' => false,
                        'active' => true
                    ]);

                    // Update Raw
                    $Raw = TableRegistry::get('Raws');
                    $queryUpdateRaw = $Raw->query();
                    $Comprador = TableRegistry::get('Chunks');
                    $queryUpdateComprador = $Comprador->query();

                    $queryUpdateRaw->update()
                        ->set(['chunking' => true])
                        ->where(['id' => $allRaw[$i]])
                        ->execute();
                    // Update Comprador
                    $queryUpdateComprador->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $allRaw[$i]])
                        ->execute();

                }
                $pieces = TableRegistry::get('Pieces');
                $entities = $pieces->newEntities($data);
                $result = $pieces->saveMany($entities);
            }
        }*/

        $query = $this->LabelSpot->DataTwitter->find('all');
        $query->where(['DataTwitter.chunking' => true, 'DataTwitter.locating' => false, 'DataTwitter.mt_classification_id' => 1]);
        $query->contain(['LabelSpot']);

        $start = '';
        $end = '';
        $respondent_id = 0;
        if ($this->request->query('start') && $this->request->query('end'))
        {
            $start = new Date($this->request->query('start'));
            $startDisplay = $start;
            $start->subDay(1);
            $start = $start->format('Y-m-d');
            $end = new Date($this->request->query('end'));
            $endDisplay = $end;
            $end->addDay(1);
            $end = $end->format('Y-m-d');
            $query->andWhere(['DataTwitter.t_time >' => $start]);
            $query->andWhere(['DataTwitter.t_time <' => $end]);
            $startDisplay->addDay(1);
            $endDisplay->subDay(1);
            $start = $startDisplay->format('d-m-Y');
            $end = $endDisplay->format('d-m-Y');
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        }
        if ($this->request->query('respondent') && $this->request->query('respondent') > 0)
        {
            $respondent_id = $this->request->query('respondent');
            $query->andWhere(['respondent_id' => $respondent_id]);
        }
        $respondents = $this->LabelSpot->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.active' => true, 'Respondents.id !=' => 11],
            'order' => ['Respondents.name']
        ]);

        $Categories = TableRegistry::get('Categories');
        $categories = $Categories->find('all', [
            'conditions' => ['Categories.active' => true],
            'order' => ['Categories.name']
        ]);
        $Weather = TableRegistry::get('Weather');
        $weather = $Weather->find('all', [
            'conditions' => ['Weather.active' => true],
            'order' => ['Weather.name']
        ]);

        $this->paginate = ['limit' => $this->limit];
        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact(['data','tags', 'respondents', 'start', 'end', 'respondent_id', 'count', 'categories', 'weather']));
        $this->set('_serialize', ['data', 'tags', 'respondents']);
    }

    public function addPlace($name, $lat, $lng)
    {
        $this->autoRender = false;
        if (!empty($name) && !empty($lat) && !empty($lng))
        {
            //find closest regency
            $connection = ConnectionManager::get('default');
            $results = $connection->execute("SELECT regency_id FROM districts ORDER BY geom <-> ST_SetSRID(st_makepoint($lng, $lat), 4326)")->fetch('assoc');
            $regency_id = $results['regency_id'];
            $Place = TableRegistry::get('Places');
            $data = [
                'regency_id' => $regency_id,
                'name' => $name,
                'lat' => $lat,
                'lng' => $lng,
                'active' => true
            ];
            $entities = $Place->newEntities($data);
            if ($Place->save($entities))
            {
                // Insert spaces table with predefined place_id
                shell_exec('cd /home/aan/congestion && python3 /home/aan/congestion/LabelChunk.py ' . $entities->id);

                return $entities->id;
            } else {
                return 0;
            }
        }
    }

    /**
     * View method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->request->is('post'))
        {
            $piece_id = $this->request->getData('piece_id');
            $space_id = $this->request->getData('space_id');
            $user_id = 3;
            $place_name = $this->request->getData('place_name');
            $place_id = $this->request->getData('place_id');
            $place_lat = $this->request->getData('place_lat');
            $place_lng = $this->request->getData('place_lng');
            $category_id = $this->request->getData('category_id');
            $weather_id = $this->request->getData('weather_id');

            if ($place_id == 0)
            {
                $place_id = $this->addPlace($place_name, $place_lat, $place_lng);
            }
            $Space = TableRegistry::get('Spaces');
            $queryUpdate = $Space->query();
            $queryUpdate->update()
                ->set(['user_id' => 1, 'place_id' => $place_id, 'category_id' => $category_id, 'weather_id' => $weather_id, 'verified' => true])
                ->where(['id' => $space_id])
                ->execute();
            return $this->redirect(['controller' => 'LabelSpot', 'action' => 'index']);
        }

        $query = $this->LabelSpot->find();
        $query->where(['LabelSpot.piece_id' => $id]);
        $piece = $query->first();
        $query = $this->LabelSpot->DataTwitter->find();
        $query->where(['DataTwitter.chunking' => true, 'DataTwitter.locating' => false, 'DataTwitter.mt_classification_id' => 1, 'DataTwitter.raw_id' => $piece->raw_id]);
        $query->contain(['LabelSpot']);

        $Categories = TableRegistry::get('Categories');
        $categories = $Categories->find('all', [
            'conditions' => ['Categories.active' => true],
            'order' => ['Categories.name']
        ]);
        $Weather = TableRegistry::get('Weather');
        $weather = $Weather->find('all', [
            'conditions' => ['Weather.active' => true],
            'order' => ['Weather.name']
        ]);

        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();
        $data = $query->first();
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact(['data', 'categories', 'weather', 'piece']));
        $this->set('_serialize', ['data', 'piece']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelSpot = $this->LabelSpot->newEntity();
        if ($this->request->is('post')) {
            $labelSpot = $this->LabelSpot->patchEntity($labelSpot, $this->request->getData());
            if ($this->LabelSpot->save($labelSpot)) {
                $this->Flash->success(__('The label spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label spot could not be saved. Please, try again.'));
        }
        $raws = $this->LabelSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelSpot->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelSpot->Pieces->find('list', ['limit' => 200]);
        $spaces = $this->LabelSpot->Spaces->find('list', ['limit' => 200]);
        $places = $this->LabelSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->LabelSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->LabelSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->LabelSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->LabelSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('labelSpot', 'raws', 'respondents', 'pieces', 'spaces', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelSpot = $this->LabelSpot->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelSpot = $this->LabelSpot->patchEntity($labelSpot, $this->request->getData());
            if ($this->LabelSpot->save($labelSpot)) {
                $this->Flash->success(__('The label spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label spot could not be saved. Please, try again.'));
        }
        $raws = $this->LabelSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelSpot->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelSpot->Pieces->find('list', ['limit' => 200]);
        $spaces = $this->LabelSpot->Spaces->find('list', ['limit' => 200]);
        $places = $this->LabelSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->LabelSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->LabelSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->LabelSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->LabelSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('labelSpot', 'raws', 'respondents', 'pieces', 'spaces', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelSpot = $this->LabelSpot->get($id);
        if ($this->LabelSpot->delete($labelSpot)) {
            $this->Flash->success(__('The label spot has been deleted.'));
    } else {
        $this->Flash->error(__('The label spot could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
    }
    }
