<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * LabelChunk Controller
 *
 * @property \App\Model\Table\LabelChunkTable $LabelChunk
 *
 * @method \App\Model\Entity\LabelChunk[] paginate($object = null, array $settings = [])
 */
class LabelChunkController extends AppController
{
    public $title = 'Chunking';
    public $limit = 5;

    //public $helpers = ['ElasticSearch.ClientBuilder'];

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['label-chunk', 'Chunking']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $allRaw = null;
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

                // Insert spaces table with predefined place_id
                shell_exec('cd /home/aan/congestion && python3 /home/aan/congestion/LabelChunk.py');
            }
        }

        $query = $this->LabelChunk->DataTwitter->find('all');
        $query->where(['DataTwitter.chunking' => false, 'DataTwitter.mt_classification_id' => 1]);
        $query->contain(['LabelChunk']);

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
        $respondents = $this->LabelChunk->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.active' => true, 'Respondents.id !=' => 11],
            'order' => ['Respondents.name']
        ]);

        $this->paginate = ['limit' => $this->limit];
        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact(['data','tags', 'respondents', 'start', 'end', 'respondent_id', 'count']));
        $this->set('_serialize', ['data', 'tags', 'respondents']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelChunk = $this->LabelChunk->get($id, [
            'contain' => ['Raws', 'Respondents', 'Pieces']
        ]);

        $this->set('labelChunk', $labelChunk);
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelChunk = $this->LabelChunk->newEntity();
        if ($this->request->is('post')) {
            $labelChunk = $this->LabelChunk->patchEntity($labelChunk, $this->request->getData());
            if ($this->LabelChunk->save($labelChunk)) {
                $this->Flash->success(__('The label chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label chunk could not be saved. Please, try again.'));
        }
        $raws = $this->LabelChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelChunk->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelChunk->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('labelChunk', 'raws', 'respondents', 'pieces'));
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelChunk = $this->LabelChunk->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelChunk = $this->LabelChunk->patchEntity($labelChunk, $this->request->getData());
            if ($this->LabelChunk->save($labelChunk)) {
                $this->Flash->success(__('The label chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label chunk could not be saved. Please, try again.'));
        }
        $raws = $this->LabelChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelChunk->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelChunk->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('labelChunk', 'raws', 'respondents', 'pieces'));
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelChunk = $this->LabelChunk->get($id);
        if ($this->LabelChunk->delete($labelChunk)) {
            $this->Flash->success(__('The label chunk has been deleted.'));
    } else {
        $this->Flash->error(__('The label chunk could not be deleted. Please, try again.'));
    }

    return $this->redirect(['action' => 'index']);
    }
    }
