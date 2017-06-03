<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chunks Controller
 *
 * @property \App\Model\Table\ChunksTable $Chunks
 *
 * @method \App\Model\Entity\Chunk[] paginate($object = null, array $settings = [])
 */
class ChunksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ts', 'Kinds']
        ];
        $chunks = $this->paginate($this->Chunks);

        $this->set(compact('chunks'));
        $this->set('_serialize', ['chunks']);
    }

    /**
     * View method
     *
     * @param string|null $id Chunk id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chunk = $this->Chunks->get($id, [
            'contain' => ['Ts', 'Kinds', 'Pieces', 'Spots']
        ]);

        $this->set('chunk', $chunk);
        $this->set('_serialize', ['chunk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chunk = $this->Chunks->newEntity();
        if ($this->request->is('post')) {
            $chunk = $this->Chunks->patchEntity($chunk, $this->request->getData());
            if ($this->Chunks->save($chunk)) {
                $this->Flash->success(__('The chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk could not be saved. Please, try again.'));
        }
        $ts = $this->Chunks->Ts->find('list', ['limit' => 200]);
        $kinds = $this->Chunks->Kinds->find('list', ['limit' => 200]);
        $this->set(compact('chunk', 'ts', 'kinds'));
        $this->set('_serialize', ['chunk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chunk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chunk = $this->Chunks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chunk = $this->Chunks->patchEntity($chunk, $this->request->getData());
            if ($this->Chunks->save($chunk)) {
                $this->Flash->success(__('The chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chunk could not be saved. Please, try again.'));
        }
        $ts = $this->Chunks->Ts->find('list', ['limit' => 200]);
        $kinds = $this->Chunks->Kinds->find('list', ['limit' => 200]);
        $this->set(compact('chunk', 'ts', 'kinds'));
        $this->set('_serialize', ['chunk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chunk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chunk = $this->Chunks->get($id);
        if ($this->Chunks->delete($chunk)) {
            $this->Flash->success(__('The chunk has been deleted.'));
        } else {
            $this->Flash->error(__('The chunk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
