<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Errors Controller
 *
 * @property \App\Model\Table\ErrorsTable $Errors
 *
 * @method \App\Model\Entity\Error[] paginate($object = null, array $settings = [])
 */
class ErrorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $errors = $this->paginate($this->Errors);

        $this->set(compact('errors'));
        $this->set('_serialize', ['errors']);
    }

    /**
     * View method
     *
     * @param string|null $id Error id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $error = $this->Errors->get($id, [
            'contain' => ['Fails', 'Reviews']
        ]);

        $this->set('error', $error);
        $this->set('_serialize', ['error']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $error = $this->Errors->newEntity();
        if ($this->request->is('post')) {
            $error = $this->Errors->patchEntity($error, $this->request->getData());
            if ($this->Errors->save($error)) {
                $this->Flash->success(__('The error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The error could not be saved. Please, try again.'));
        }
        $this->set(compact('error'));
        $this->set('_serialize', ['error']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Error id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $error = $this->Errors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $error = $this->Errors->patchEntity($error, $this->request->getData());
            if ($this->Errors->save($error)) {
                $this->Flash->success(__('The error has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The error could not be saved. Please, try again.'));
        }
        $this->set(compact('error'));
        $this->set('_serialize', ['error']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Error id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $error = $this->Errors->get($id);
        if ($this->Errors->delete($error)) {
            $this->Flash->success(__('The error has been deleted.'));
        } else {
            $this->Flash->error(__('The error could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
