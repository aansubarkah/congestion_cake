<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fails Controller
 *
 * @property \App\Model\Table\FailsTable $Fails
 *
 * @method \App\Model\Entity\Fail[] paginate($object = null, array $settings = [])
 */
class FailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Errors']
        ];
        $fails = $this->paginate($this->Fails);

        $this->set(compact('fails'));
        $this->set('_serialize', ['fails']);
    }

    /**
     * View method
     *
     * @param string|null $id Fail id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fail = $this->Fails->get($id, [
            'contain' => ['Raws', 'Errors']
        ]);

        $this->set('fail', $fail);
        $this->set('_serialize', ['fail']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fail = $this->Fails->newEntity();
        if ($this->request->is('post')) {
            $fail = $this->Fails->patchEntity($fail, $this->request->getData());
            if ($this->Fails->save($fail)) {
                $this->Flash->success(__('The fail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fail could not be saved. Please, try again.'));
        }
        $raws = $this->Fails->Raws->find('list', ['limit' => 200]);
        $errors = $this->Fails->Errors->find('list', ['limit' => 200]);
        $this->set(compact('fail', 'raws', 'errors'));
        $this->set('_serialize', ['fail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Fail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fail = $this->Fails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fail = $this->Fails->patchEntity($fail, $this->request->getData());
            if ($this->Fails->save($fail)) {
                $this->Flash->success(__('The fail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fail could not be saved. Please, try again.'));
        }
        $raws = $this->Fails->Raws->find('list', ['limit' => 200]);
        $errors = $this->Fails->Errors->find('list', ['limit' => 200]);
        $this->set(compact('fail', 'raws', 'errors'));
        $this->set('_serialize', ['fail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Fail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fail = $this->Fails->get($id);
        if ($this->Fails->delete($fail)) {
            $this->Flash->success(__('The fail has been deleted.'));
        } else {
            $this->Flash->error(__('The fail could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
