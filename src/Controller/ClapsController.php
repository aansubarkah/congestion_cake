<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Claps Controller
 *
 * @property \App\Model\Table\ClapsTable $Claps
 *
 * @method \App\Model\Entity\Clap[] paginate($object = null, array $settings = [])
 */
class ClapsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws']
        ];
        $claps = $this->paginate($this->Claps);

        $this->set(compact('claps'));
        $this->set('_serialize', ['claps']);
    }

    /**
     * View method
     *
     * @param string|null $id Clap id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $clap = $this->Claps->get($id, [
            'contain' => ['Raws']
        ]);

        $this->set('clap', $clap);
        $this->set('_serialize', ['clap']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $clap = $this->Claps->newEntity();
        if ($this->request->is('post')) {
            $clap = $this->Claps->patchEntity($clap, $this->request->getData());
            if ($this->Claps->save($clap)) {
                $this->Flash->success(__('The clap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clap could not be saved. Please, try again.'));
        }
        $raws = $this->Claps->Raws->find('list', ['limit' => 200]);
        $this->set(compact('clap', 'raws'));
        $this->set('_serialize', ['clap']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Clap id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $clap = $this->Claps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $clap = $this->Claps->patchEntity($clap, $this->request->getData());
            if ($this->Claps->save($clap)) {
                $this->Flash->success(__('The clap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The clap could not be saved. Please, try again.'));
        }
        $raws = $this->Claps->Raws->find('list', ['limit' => 200]);
        $this->set(compact('clap', 'raws'));
        $this->set('_serialize', ['clap']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Clap id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $clap = $this->Claps->get($id);
        if ($this->Claps->delete($clap)) {
            $this->Flash->success(__('The clap has been deleted.'));
        } else {
            $this->Flash->error(__('The clap could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
