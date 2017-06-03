<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hierarchies Controller
 *
 * @property \App\Model\Table\HierarchiesTable $Hierarchies
 *
 * @method \App\Model\Entity\Hierarchy[] paginate($object = null, array $settings = [])
 */
class HierarchiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $hierarchies = $this->paginate($this->Hierarchies);

        $this->set(compact('hierarchies'));
        $this->set('_serialize', ['hierarchies']);
    }

    /**
     * View method
     *
     * @param string|null $id Hierarchy id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hierarchy = $this->Hierarchies->get($id, [
            'contain' => ['Regencies']
        ]);

        $this->set('hierarchy', $hierarchy);
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hierarchy = $this->Hierarchies->newEntity();
        if ($this->request->is('post')) {
            $hierarchy = $this->Hierarchies->patchEntity($hierarchy, $this->request->getData());
            if ($this->Hierarchies->save($hierarchy)) {
                $this->Flash->success(__('The hierarchy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hierarchy could not be saved. Please, try again.'));
        }
        $this->set(compact('hierarchy'));
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Hierarchy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hierarchy = $this->Hierarchies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hierarchy = $this->Hierarchies->patchEntity($hierarchy, $this->request->getData());
            if ($this->Hierarchies->save($hierarchy)) {
                $this->Flash->success(__('The hierarchy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hierarchy could not be saved. Please, try again.'));
        }
        $this->set(compact('hierarchy'));
        $this->set('_serialize', ['hierarchy']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Hierarchy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hierarchy = $this->Hierarchies->get($id);
        if ($this->Hierarchies->delete($hierarchy)) {
            $this->Flash->success(__('The hierarchy has been deleted.'));
        } else {
            $this->Flash->error(__('The hierarchy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
