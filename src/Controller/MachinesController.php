<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 *
 * @method \App\Model\Entity\Machine[] paginate($object = null, array $settings = [])
 */
class MachinesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ts', 'Classifications', 'Places', 'Categories', 'Weather', 'Spots']
        ];
        $machines = $this->paginate($this->Machines);

        $this->set(compact('machines'));
        $this->set('_serialize', ['machines']);
    }

    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => ['Ts', 'Classifications', 'Places', 'Categories', 'Weather', 'Spots']
        ]);

        $this->set('machine', $machine);
        $this->set('_serialize', ['machine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machine = $this->Machines->newEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $ts = $this->Machines->Ts->find('list', ['limit' => 200]);
        $classifications = $this->Machines->Classifications->find('list', ['limit' => 200]);
        $places = $this->Machines->Places->find('list', ['limit' => 200]);
        $categories = $this->Machines->Categories->find('list', ['limit' => 200]);
        $weather = $this->Machines->Weather->find('list', ['limit' => 200]);
        $spots = $this->Machines->Spots->find('list', ['limit' => 200]);
        $this->set(compact('machine', 'ts', 'classifications', 'places', 'categories', 'weather', 'spots'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->patchEntity($machine, $this->request->getData());
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The machine could not be saved. Please, try again.'));
        }
        $ts = $this->Machines->Ts->find('list', ['limit' => 200]);
        $classifications = $this->Machines->Classifications->find('list', ['limit' => 200]);
        $places = $this->Machines->Places->find('list', ['limit' => 200]);
        $categories = $this->Machines->Categories->find('list', ['limit' => 200]);
        $weather = $this->Machines->Weather->find('list', ['limit' => 200]);
        $spots = $this->Machines->Spots->find('list', ['limit' => 200]);
        $this->set(compact('machine', 'ts', 'classifications', 'places', 'categories', 'weather', 'spots'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machines->get($id);
        if ($this->Machines->delete($machine)) {
            $this->Flash->success(__('The machine has been deleted.'));
        } else {
            $this->Flash->error(__('The machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
