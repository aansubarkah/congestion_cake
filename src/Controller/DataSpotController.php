<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * DataSpot Controller
 *
 * @property \App\Model\Table\DataSpotTable $DataSpot
 *
 * @method \App\Model\Entity\DataSpot[] paginate($object = null, array $settings = [])
 */
class DataSpotController extends AppController
{
    public $title = 'Spoting';
    public $limit = 200;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['DataSpot', 'Spoting']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $query = $this->DataSpot->DataTwitter->find('all');
        $query->where(['DataTwitter.at_classification_id' => 1]);
        $query->contain(['DataSpot', 'DataChunk']);

        $start = '';
        $end = '';
        $respondent_id = 0;
        if ($this->request->query('start') && $this->request->query('end'))
        {
            $start = new Date($this->request->query('start'));
            $startDisplay = $start;
            //$start->subDay(1);
            $start = $start->format('Y-m-d');
            $end = new Date($this->request->query('end'));
            $endDisplay = $end;
            $end->addDay(1);
            $end = $end->format('Y-m-d');
            $query->andWhere(['DataTwitter.t_time >' => $start]);
            $query->andWhere(['DataTwitter.t_time <' => $end]);
            //$startDisplay->addDay(1);
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
        $respondents = $this->DataSpot->DataTwitter->Respondents->find('all', [
            'conditions' => [
                'Respondents.official' => true,
                'Respondents.t_user_id IS NOT' => null,
                'Respondents.id !=' => 11,
                'OR' => [
                    'Respondents.active' => true,
                    //'Respondents.tmc' => true
                ]
            ],
            'order' => ['Respondents.name']
        ]);

        /*$respondents = $this->LabelSpot->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.t_user_id IS NOT' => null, 'Respondents.id !=' => 11],
            'order' => ['Respondents.name']
        ]);*/

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

        /*$query = $this->DataSpot->DataTwitter->find('all', [
            'conditions' => ['DataTwitter.at_classification_id' => 1],
            'contain' => ['DataChunk', 'DataSpot']
        ]);
        if ($this->request->query('search'))
        {
            $query->where(['LOWER(info) LIKE' => '%' . strtolower($this->request->query('search')) . '%']);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', 'Spoting');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);*/
    }

    /**
     * View method
     *
     * @param string|null $id Data Spot id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataSpot = $this->DataSpot->get($id, [
            'contain' => ['Raws', 'Respondents', 'Chunks', 'Spots', 'Places', 'Regencies', 'Hierarchies', 'Categories', 'Weather']
        ]);

        $this->set('dataSpot', $dataSpot);
        $this->set('_serialize', ['dataSpot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataSpot = $this->DataSpot->newEntity();
        if ($this->request->is('post')) {
            $dataSpot = $this->DataSpot->patchEntity($dataSpot, $this->request->getData());
            if ($this->DataSpot->save($dataSpot)) {
                $this->Flash->success(__('The data spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data spot could not be saved. Please, try again.'));
        }
        $raws = $this->DataSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataSpot->Respondents->find('list', ['limit' => 200]);
        $chunks = $this->DataSpot->Chunks->find('list', ['limit' => 200]);
        $spots = $this->DataSpot->Spots->find('list', ['limit' => 200]);
        $places = $this->DataSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->DataSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->DataSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->DataSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->DataSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('dataSpot', 'raws', 'respondents', 'chunks', 'spots', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['dataSpot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Spot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataSpot = $this->DataSpot->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataSpot = $this->DataSpot->patchEntity($dataSpot, $this->request->getData());
            if ($this->DataSpot->save($dataSpot)) {
                $this->Flash->success(__('The data spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data spot could not be saved. Please, try again.'));
        }
        $raws = $this->DataSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataSpot->Respondents->find('list', ['limit' => 200]);
        $chunks = $this->DataSpot->Chunks->find('list', ['limit' => 200]);
        $spots = $this->DataSpot->Spots->find('list', ['limit' => 200]);
        $places = $this->DataSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->DataSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->DataSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->DataSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->DataSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('dataSpot', 'raws', 'respondents', 'chunks', 'spots', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['dataSpot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Spot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataSpot = $this->DataSpot->get($id);
        if ($this->DataSpot->delete($dataSpot)) {
            $this->Flash->success(__('The data spot has been deleted.'));
        } else {
            $this->Flash->error(__('The data spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }

}
