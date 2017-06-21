<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public $limit = 10;

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
        $query = $this->DataSpot->DataTwitter->find('all', [
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
        $this->set('_serialize', ['data']);
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
