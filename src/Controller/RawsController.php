<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Raws Controller
 *
 * @property \App\Model\Table\RawsTable $Raws
 *
 * @method \App\Model\Entity\Raw[] paginate($object = null, array $settings = [])
 */
class RawsController extends AppController
{
    public $title = 'Twitter';
    public $limit = 10;

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
        $query = $this->Raws->find('all', [
            'conditions' => ['Raws.active' => true],
            'contain' => ['Respondents', 'Kinds'],
            'limit' => $this->limit
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
        } else {
            $query->order(['t_time' => 'DESC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $breadcrumbs = $this->breadcrumbs;
        $this->set('breadcrumbs', $breadcrumbs);

        $raws = $this->paginate($query);
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('raws'));
        $this->set('_serialize', ['raws']);
    }

    /**
     * Label method
     *
     * @return \Cake\Http\Response|null
     */
    public function label()
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
                $entities = $this->Raws->Denominations->newEntities($data);
                $result = $this->Raws->Denominations->saveMany($entities);
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
                $entities = $this->Raws->Denominations->newEntities($data);
                $result = $this->Raws->Denominations->saveMany($entities);
            }
        }
        $query = $this->Raws->find('all', [
            'contain' => [
                'Denominations' => ['conditions' => ['Denominations.raw_id' => null]],
                'Respondents',
                'Kinds'
            ],
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
        } else {
            $query->order(['t_time' => 'DESC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $breadcrumbs = [
            ['raws', 'Twitter'],
            ['raws/label', 'Label']
        ];
        $this->set('breadcrumbs', $breadcrumbs);

        $raws = $this->paginate($query);
        //$raws = $query->toArray();
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('raws'));
        $this->set('allRelevant', $allRelevant);
        $this->set('_serialize', ['raws', 'allRelevant', 'allNotRelevant']);
    }

    /**
     * View method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => ['Respondents', 'Claps', 'Denominations', 'Elements', 'Fails', 'Kinds', 'Locations', 'Markers', 'Reviews']
        ]);
        $this->set('title', 'Sumber');
        $this->set('raw', $raw);
        $this->set('_serialize', ['raw', 'title']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $raw = $this->Raws->newEntity();
        if ($this->request->is('post')) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $respondents = $this->Raws->Respondents->find('list', ['limit' => 200]);
        $ts = $this->Raws->Ts->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'respondents', 'ts'));
        $this->set('_serialize', ['raw']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $respondents = $this->Raws->Respondents->find('list', ['limit' => 200]);
        $ts = $this->Raws->Ts->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'respondents', 'ts'));
        $this->set('_serialize', ['raw']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $raw = $this->Raws->get($id);
        if ($this->Raws->delete($raw)) {
            $this->Flash->success(__('The raw has been deleted.'));
        } else {
            $this->Flash->error(__('The raw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
