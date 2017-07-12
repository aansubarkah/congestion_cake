<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * DataTwitter Controller
 *
 * @property \App\Model\Table\DataTwitterTable $DataTwitter
 *
 * @method \App\Model\Entity\DataTwitter[] paginate($object = null, array $settings = [])
 */
class DataTwitterController extends AppController
{
    public $title = 'Twitter';
    public $limit = 200;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['raws', 'Twitter']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $allRelevant = null;
        $allNotRelevant = null;
        if ($this->request->is('post')) {
            $allRelevant = explode(',', $this->request->getData('all_relevant'));
            $allNotRelevant = explode(',', $this->request->getData('all_not_relevant'));

            if (!empty($allRelevant))
            {
                $data = [];
                foreach ($allRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 1,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }

            if (!empty($allNotRelevant))
            {
                $data = [];
                foreach ($allNotRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 2,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }
        }
        $respondents = $this->DataTwitter->Respondents->find('all', [
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
        $query = $this->DataTwitter->find('all');
        $query->where(['DataTwitter.at_classification_id IS NOT' => null]);
        $query->contain(['DataKind', 'DataChunk', 'DataSpot']);
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
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();
        $data = $this->paginate($query);
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact(['data', 'respondents', 'start', 'end', 'respondent_id', 'count']));
        $this->set('_serialize', ['data', 'respondents']);
        /*$query = $this->DataTwitter->find('all', [
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
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);*/
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index1()
    {
        $allRelevant = null;
        $allNotRelevant = null;
        if ($this->request->is('post')) {
            $allRelevant = explode(',', $this->request->getData('all_relevant'));
            $allNotRelevant = explode(',', $this->request->getData('all_not_relevant'));

            if (!empty($allRelevant))
            {
                $data = [];
                foreach ($allRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 1,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }

            if (!empty($allNotRelevant))
            {
                $data = [];
                foreach ($allNotRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 2,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }
        }

        $query = $this->DataTwitter->find('all', [
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
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);

    }

    /**
     * View method
     *
     * @param string|null $id Data Twitter id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataTwitter = $this->DataTwitter->get($id, [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Respondents']
        ]);

        $this->set('dataTwitter', $dataTwitter);
        $this->set('_serialize', ['dataTwitter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataTwitter = $this->DataTwitter->newEntity();
        if ($this->request->is('post')) {
            $dataTwitter = $this->DataTwitter->patchEntity($dataTwitter, $this->request->getData());
            if ($this->DataTwitter->save($dataTwitter)) {
                $this->Flash->success(__('The data twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data twitter could not be saved. Please, try again.'));
        }
        $raws = $this->DataTwitter->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataTwitter->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataTwitter->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->DataTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('dataTwitter', 'raws', 'kinds', 'classifications', 'respondents'));
        $this->set('_serialize', ['dataTwitter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Twitter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataTwitter = $this->DataTwitter->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataTwitter = $this->DataTwitter->patchEntity($dataTwitter, $this->request->getData());
            if ($this->DataTwitter->save($dataTwitter)) {
                $this->Flash->success(__('The data twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data twitter could not be saved. Please, try again.'));
        }
        $raws = $this->DataTwitter->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataTwitter->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataTwitter->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->DataTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('dataTwitter', 'raws', 'kinds', 'classifications', 'respondents'));
        $this->set('_serialize', ['dataTwitter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Twitter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataTwitter = $this->DataTwitter->get($id);
        if ($this->DataTwitter->delete($dataTwitter)) {
            $this->Flash->success(__('The data twitter has been deleted.'));
        } else {
            $this->Flash->error(__('The data twitter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }

}
