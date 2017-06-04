<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Kinds Controller
 *
 * @property \App\Model\Table\KindsTable $Kinds
 *
 * @method \App\Model\Entity\Kind[] paginate($object = null, array $settings = [])
 */
class KindsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Classifications']
        ];
        $kinds = $this->paginate($this->Kinds);

        $this->set(compact('kinds'));
        $this->set('_serialize', ['kinds']);
    }

    /**
     * View method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $kind = $this->Kinds->get($id, [
            'contain' => ['Raws', 'Classifications', 'Breeds', 'Chunks']
        ]);

        $this->set('kind', $kind);
        $this->set('_serialize', ['kind']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $kind = $this->Kinds->newEntity();
        if ($this->request->is('post')) {
            $kind = $this->Kinds->patchEntity($kind, $this->request->getData());
            if ($this->Kinds->save($kind)) {
                $this->Flash->success(__('The kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kind could not be saved. Please, try again.'));
        }
        $raws = $this->Kinds->Raws->find('list', ['limit' => 200]);
        $classifications = $this->Kinds->Classifications->find('list', ['limit' => 200]);
        $ts = $this->Kinds->Ts->find('list', ['limit' => 200]);
        $this->set(compact('kind', 'raws', 'classifications'));
        $this->set('_serialize', ['kind']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $kind = $this->Kinds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $kind = $this->Kinds->patchEntity($kind, $this->request->getData());
            if ($this->Kinds->save($kind)) {
                $this->Flash->success(__('The kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kind could not be saved. Please, try again.'));
        }
        $raws = $this->Kinds->Raws->find('list', ['limit' => 200]);
        $classifications = $this->Kinds->Classifications->find('list', ['limit' => 200]);
        $ts = $this->Kinds->Ts->find('list', ['limit' => 200]);
        $this->set(compact('kind', 'raws', 'classifications'));
        $this->set('_serialize', ['kind']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Kind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $kind = $this->Kinds->get($id);
        if ($this->Kinds->delete($kind)) {
            $this->Flash->success(__('The kind has been deleted.'));
        } else {
            $this->Flash->error(__('The kind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
