<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Humans Controller
 *
 * @property \App\Model\Table\HumansTable $Humans
 *
 * @method \App\Model\Entity\Human[] paginate($object = null, array $settings = [])
 */
class HumansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Ts', 'Classifications', 'Places', 'Categories', 'Weather']
        ];
        $humans = $this->paginate($this->Humans);

        $this->set(compact('humans'));
        $this->set('_serialize', ['humans']);
    }

    /**
     * View method
     *
     * @param string|null $id Human id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $human = $this->Humans->get($id, [
            'contain' => ['Ts', 'Classifications', 'Places', 'Categories', 'Weather']
        ]);

        $this->set('human', $human);
        $this->set('_serialize', ['human']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $human = $this->Humans->newEntity();
        if ($this->request->is('post')) {
            $human = $this->Humans->patchEntity($human, $this->request->getData());
            if ($this->Humans->save($human)) {
                $this->Flash->success(__('The human has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The human could not be saved. Please, try again.'));
        }
        $ts = $this->Humans->Ts->find('list', ['limit' => 200]);
        $classifications = $this->Humans->Classifications->find('list', ['limit' => 200]);
        $places = $this->Humans->Places->find('list', ['limit' => 200]);
        $categories = $this->Humans->Categories->find('list', ['limit' => 200]);
        $weather = $this->Humans->Weather->find('list', ['limit' => 200]);
        $this->set(compact('human', 'ts', 'classifications', 'places', 'categories', 'weather'));
        $this->set('_serialize', ['human']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Human id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $human = $this->Humans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $human = $this->Humans->patchEntity($human, $this->request->getData());
            if ($this->Humans->save($human)) {
                $this->Flash->success(__('The human has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The human could not be saved. Please, try again.'));
        }
        $ts = $this->Humans->Ts->find('list', ['limit' => 200]);
        $classifications = $this->Humans->Classifications->find('list', ['limit' => 200]);
        $places = $this->Humans->Places->find('list', ['limit' => 200]);
        $categories = $this->Humans->Categories->find('list', ['limit' => 200]);
        $weather = $this->Humans->Weather->find('list', ['limit' => 200]);
        $this->set(compact('human', 'ts', 'classifications', 'places', 'categories', 'weather'));
        $this->set('_serialize', ['human']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Human id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $human = $this->Humans->get($id);
        if ($this->Humans->delete($human)) {
            $this->Flash->success(__('The human has been deleted.'));
        } else {
            $this->Flash->error(__('The human could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
