<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Spaces Controller
 *
 * @property \App\Model\Table\SpacesTable $Spaces
 *
 * @method \App\Model\Entity\Space[] paginate($object = null, array $settings = [])
 */
class SpacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Spots', 'Users', 'Places']
        ];
        $spaces = $this->paginate($this->Spaces);

        $this->set(compact('spaces'));
        $this->set('_serialize', ['spaces']);
    }

    /**
     * View method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $space = $this->Spaces->get($id, [
            'contain' => ['Spots', 'Users', 'Places']
        ]);

        $this->set('space', $space);
        $this->set('_serialize', ['space']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $space = $this->Spaces->newEntity();
        if ($this->request->is('post')) {
            $space = $this->Spaces->patchEntity($space, $this->request->getData());
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The space could not be saved. Please, try again.'));
        }
        $spots = $this->Spaces->Spots->find('list', ['limit' => 200]);
        $users = $this->Spaces->Users->find('list', ['limit' => 200]);
        $places = $this->Spaces->Places->find('list', ['limit' => 200]);
        $this->set(compact('space', 'spots', 'users', 'places'));
        $this->set('_serialize', ['space']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $space = $this->Spaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $space = $this->Spaces->patchEntity($space, $this->request->getData());
            if ($this->Spaces->save($space)) {
                $this->Flash->success(__('The space has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The space could not be saved. Please, try again.'));
        }
        $spots = $this->Spaces->Spots->find('list', ['limit' => 200]);
        $users = $this->Spaces->Users->find('list', ['limit' => 200]);
        $places = $this->Spaces->Places->find('list', ['limit' => 200]);
        $this->set(compact('space', 'spots', 'users', 'places'));
        $this->set('_serialize', ['space']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Space id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $space = $this->Spaces->get($id);
        if ($this->Spaces->delete($space)) {
            $this->Flash->success(__('The space has been deleted.'));
        } else {
            $this->Flash->error(__('The space could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
