<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spots Controller
 *
 * @property \App\Model\Table\SpotsTable $Spots
 *
 * @method \App\Model\Entity\Spot[] paginate($object = null, array $settings = [])
 */
class SpotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chunks', 'Ts', 'Places', 'Categories']
        ];
        $spots = $this->paginate($this->Spots);

        $this->set(compact('spots'));
        $this->set('_serialize', ['spots']);
    }

    /**
     * View method
     *
     * @param string|null $id Spot id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $spot = $this->Spots->get($id, [
            'contain' => ['Chunks', 'Ts', 'Places', 'Categories', 'Machines', 'Spaces']
        ]);

        $this->set('spot', $spot);
        $this->set('_serialize', ['spot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $spot = $this->Spots->newEntity();
        if ($this->request->is('post')) {
            $spot = $this->Spots->patchEntity($spot, $this->request->getData());
            if ($this->Spots->save($spot)) {
                $this->Flash->success(__('The spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spot could not be saved. Please, try again.'));
        }
        $chunks = $this->Spots->Chunks->find('list', ['limit' => 200]);
        $ts = $this->Spots->Ts->find('list', ['limit' => 200]);
        $places = $this->Spots->Places->find('list', ['limit' => 200]);
        $categories = $this->Spots->Categories->find('list', ['limit' => 200]);
        $this->set(compact('spot', 'chunks', 'ts', 'places', 'categories'));
        $this->set('_serialize', ['spot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Spot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $spot = $this->Spots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $spot = $this->Spots->patchEntity($spot, $this->request->getData());
            if ($this->Spots->save($spot)) {
                $this->Flash->success(__('The spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spot could not be saved. Please, try again.'));
        }
        $chunks = $this->Spots->Chunks->find('list', ['limit' => 200]);
        $ts = $this->Spots->Ts->find('list', ['limit' => 200]);
        $places = $this->Spots->Places->find('list', ['limit' => 200]);
        $categories = $this->Spots->Categories->find('list', ['limit' => 200]);
        $this->set(compact('spot', 'chunks', 'ts', 'places', 'categories'));
        $this->set('_serialize', ['spot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Spot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $spot = $this->Spots->get($id);
        if ($this->Spots->delete($spot)) {
            $this->Flash->success(__('The spot has been deleted.'));
        } else {
            $this->Flash->error(__('The spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
