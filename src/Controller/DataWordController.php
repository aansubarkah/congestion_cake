<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * DataWord Controller
 *
 * @property \App\Model\Table\DataWordTable $DataWord
 *
 * @method \App\Model\Entity\DataWord[] paginate($object = null, array $settings = [])
 */
class DataWordController extends AppController
{
    public $title = 'POS TAG';
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['data-word', 'POS TAG']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        /*$this->paginate = [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Words', 'Tags']
        ];
        $dataWord = $this->paginate($this->DataWord);

        $this->set(compact('dataWord'));
        $this->set('_serialize', ['dataWord']);*/
        $query = $this->DataWord->Raws->Kinds->find('all', [
            'contain' => [
                'Raws',
                'Raws.DataWord',
                'Raws.DataSyllable'
            ],
            'conditions' => ['Kinds.classification_id' => 1]
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
            $query->order(['t_time DESC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataWord = $this->DataWord->get($id, [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Words', 'Tags']
        ]);

        $this->set('dataWord', $dataWord);
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataWord = $this->DataWord->newEntity();
        if ($this->request->is('post')) {
            $dataWord = $this->DataWord->patchEntity($dataWord, $this->request->getData());
            if ($this->DataWord->save($dataWord)) {
                $this->Flash->success(__('The data word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data word could not be saved. Please, try again.'));
        }
        $raws = $this->DataWord->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataWord->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataWord->Classifications->find('list', ['limit' => 200]);
        $words = $this->DataWord->Words->find('list', ['limit' => 200]);
        $tags = $this->DataWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataWord', 'raws', 'kinds', 'classifications', 'words', 'tags'));
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataWord = $this->DataWord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataWord = $this->DataWord->patchEntity($dataWord, $this->request->getData());
            if ($this->DataWord->save($dataWord)) {
                $this->Flash->success(__('The data word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data word could not be saved. Please, try again.'));
        }
        $raws = $this->DataWord->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataWord->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataWord->Classifications->find('list', ['limit' => 200]);
        $words = $this->DataWord->Words->find('list', ['limit' => 200]);
        $tags = $this->DataWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataWord', 'raws', 'kinds', 'classifications', 'words', 'tags'));
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataWord = $this->DataWord->get($id);
        if ($this->DataWord->delete($dataWord)) {
            $this->Flash->success(__('The data word has been deleted.'));
        } else {
            $this->Flash->error(__('The data word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
