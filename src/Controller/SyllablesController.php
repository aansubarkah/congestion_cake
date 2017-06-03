<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Syllables Controller
 *
 * @property \App\Model\Table\SyllablesTable $Syllables
 *
 * @method \App\Model\Entity\Syllable[] paginate($object = null, array $settings = [])
 */
class SyllablesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Words']
        ];
        $syllables = $this->paginate($this->Syllables);

        $this->set(compact('syllables'));
        $this->set('_serialize', ['syllables']);
    }

    /**
     * View method
     *
     * @param string|null $id Syllable id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $syllable = $this->Syllables->get($id, [
            'contain' => ['Users', 'Words']
        ]);

        $this->set('syllable', $syllable);
        $this->set('_serialize', ['syllable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $syllable = $this->Syllables->newEntity();
        if ($this->request->is('post')) {
            $syllable = $this->Syllables->patchEntity($syllable, $this->request->getData());
            if ($this->Syllables->save($syllable)) {
                $this->Flash->success(__('The syllable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The syllable could not be saved. Please, try again.'));
        }
        $users = $this->Syllables->Users->find('list', ['limit' => 200]);
        $words = $this->Syllables->Words->find('list', ['limit' => 200]);
        $this->set(compact('syllable', 'users', 'words'));
        $this->set('_serialize', ['syllable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Syllable id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $syllable = $this->Syllables->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $syllable = $this->Syllables->patchEntity($syllable, $this->request->getData());
            if ($this->Syllables->save($syllable)) {
                $this->Flash->success(__('The syllable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The syllable could not be saved. Please, try again.'));
        }
        $users = $this->Syllables->Users->find('list', ['limit' => 200]);
        $words = $this->Syllables->Words->find('list', ['limit' => 200]);
        $this->set(compact('syllable', 'users', 'words'));
        $this->set('_serialize', ['syllable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Syllable id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $syllable = $this->Syllables->get($id);
        if ($this->Syllables->delete($syllable)) {
            $this->Flash->success(__('The syllable has been deleted.'));
        } else {
            $this->Flash->error(__('The syllable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
