<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * DataChunk Controller
 *
 * @property \App\Model\Table\DataChunkTable $DataChunk
 *
 * @method \App\Model\Entity\DataChunk[] paginate($object = null, array $settings = [])
 */
class DataChunkController extends AppController
{
    public $title = 'Chunking';
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['DataChunk', 'Chunking']
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
                }
                $pieces = TableRegistry::get('Pieces');
                $entities = $pieces->newEntities($data);
                $result = $pieces->saveMany($entities);
            }
        }

        $query = $this->DataChunk->DataTwitter->find('all', [
            'conditions' => ['DataTwitter.at_classification_id' => 1],
            'contain' => ['DataChunk', 'DataPiece']
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
        $this->set('title', 'Chunking');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Chunk id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataChunk = $this->DataChunk->get($id, [
            'contain' => ['Raws', 'Respondents', 'Chunks']
        ]);

        $this->set('dataChunk', $dataChunk);
        $this->set('_serialize', ['dataChunk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataChunk = $this->DataChunk->newEntity();
        if ($this->request->is('post')) {
            $dataChunk = $this->DataChunk->patchEntity($dataChunk, $this->request->getData());
            if ($this->DataChunk->save($dataChunk)) {
                $this->Flash->success(__('The data chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data chunk could not be saved. Please, try again.'));
        }
        $raws = $this->DataChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataChunk->Respondents->find('list', ['limit' => 200]);
        $chunks = $this->DataChunk->Chunks->find('list', ['limit' => 200]);
        $this->set(compact('dataChunk', 'raws', 'respondents', 'chunks'));
        $this->set('_serialize', ['dataChunk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Chunk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataChunk = $this->DataChunk->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataChunk = $this->DataChunk->patchEntity($dataChunk, $this->request->getData());
            if ($this->DataChunk->save($dataChunk)) {
                $this->Flash->success(__('The data chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data chunk could not be saved. Please, try again.'));
        }
        $raws = $this->DataChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataChunk->Respondents->find('list', ['limit' => 200]);
        $chunks = $this->DataChunk->Chunks->find('list', ['limit' => 200]);
        $this->set(compact('dataChunk', 'raws', 'respondents', 'chunks'));
        $this->set('_serialize', ['dataChunk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Chunk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataChunk = $this->DataChunk->get($id);
        if ($this->DataChunk->delete($dataChunk)) {
            $this->Flash->success(__('The data chunk has been deleted.'));
        } else {
            $this->Flash->error(__('The data chunk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }

}
