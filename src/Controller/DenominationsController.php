<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Denominations Controller
 *
 * @property \App\Model\Table\DenominationsTable $Denominations
 *
 * @method \App\Model\Entity\Denomination[] paginate($object = null, array $settings = [])
 */
class DenominationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Classifications', 'Users']
        ];
        $denominations = $this->paginate($this->Denominations);

        $this->set(compact('denominations'));
        $this->set('_serialize', ['denominations']);
    }

    /**
     * View method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $denomination = $this->Denominations->get($id, [
            'contain' => ['Raws', 'Classifications', 'Users']
        ]);

        $this->set('denomination', $denomination);
        $this->set('_serialize', ['denomination']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $denomination = $this->Denominations->newEntity();
        if ($this->request->is('post')) {
            $denomination = $this->Denominations->patchEntity($denomination, $this->request->getData());
            if ($this->Denominations->save($denomination)) {
                $this->Flash->success(__('The denomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The denomination could not be saved. Please, try again.'));
        }
        $raws = $this->Denominations->Raws->find('list', ['limit' => 200]);
        $classifications = $this->Denominations->Classifications->find('list', ['limit' => 200]);
        $users = $this->Denominations->Users->find('list', ['limit' => 200]);
        $this->set(compact('denomination', 'raws', 'classifications', 'users'));
        $this->set('_serialize', ['denomination']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $denomination = $this->Denominations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $denomination = $this->Denominations->patchEntity($denomination, $this->request->getData());
            if ($this->Denominations->save($denomination)) {
                $this->Flash->success(__('The denomination has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The denomination could not be saved. Please, try again.'));
        }
        $raws = $this->Denominations->Raws->find('list', ['limit' => 200]);
        $classifications = $this->Denominations->Classifications->find('list', ['limit' => 200]);
        $users = $this->Denominations->Users->find('list', ['limit' => 200]);
        $this->set(compact('denomination', 'raws', 'classifications', 'users'));
        $this->set('_serialize', ['denomination']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Denomination id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $denomination = $this->Denominations->get($id);
        if ($this->Denominations->delete($denomination)) {
            $this->Flash->success(__('The denomination has been deleted.'));
        } else {
            $this->Flash->error(__('The denomination could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
