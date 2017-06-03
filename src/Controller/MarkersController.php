<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Markers Controller
 *
 * @property \App\Model\Table\MarkersTable $Markers
 *
 * @method \App\Model\Entity\Marker[] paginate($object = null, array $settings = [])
 */
class MarkersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories', 'Users', 'Respondents', 'Weather', 'Raws']
        ];
        $markers = $this->paginate($this->Markers);

        $this->set(compact('markers'));
        $this->set('_serialize', ['markers']);
    }

    /**
     * View method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marker = $this->Markers->get($id, [
            'contain' => ['Categories', 'Users', 'Respondents', 'Weather', 'Raws']
        ]);

        $this->set('marker', $marker);
        $this->set('_serialize', ['marker']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marker = $this->Markers->newEntity();
        if ($this->request->is('post')) {
            $marker = $this->Markers->patchEntity($marker, $this->request->getData());
            if ($this->Markers->save($marker)) {
                $this->Flash->success(__('The marker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marker could not be saved. Please, try again.'));
        }
        $categories = $this->Markers->Categories->find('list', ['limit' => 200]);
        $users = $this->Markers->Users->find('list', ['limit' => 200]);
        $respondents = $this->Markers->Respondents->find('list', ['limit' => 200]);
        $weather = $this->Markers->Weather->find('list', ['limit' => 200]);
        $raws = $this->Markers->Raws->find('list', ['limit' => 200]);
        $this->set(compact('marker', 'categories', 'users', 'respondents', 'weather', 'raws'));
        $this->set('_serialize', ['marker']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marker = $this->Markers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marker = $this->Markers->patchEntity($marker, $this->request->getData());
            if ($this->Markers->save($marker)) {
                $this->Flash->success(__('The marker has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The marker could not be saved. Please, try again.'));
        }
        $categories = $this->Markers->Categories->find('list', ['limit' => 200]);
        $users = $this->Markers->Users->find('list', ['limit' => 200]);
        $respondents = $this->Markers->Respondents->find('list', ['limit' => 200]);
        $weather = $this->Markers->Weather->find('list', ['limit' => 200]);
        $raws = $this->Markers->Raws->find('list', ['limit' => 200]);
        $this->set(compact('marker', 'categories', 'users', 'respondents', 'weather', 'raws'));
        $this->set('_serialize', ['marker']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Marker id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marker = $this->Markers->get($id);
        if ($this->Markers->delete($marker)) {
            $this->Flash->success(__('The marker has been deleted.'));
        } else {
            $this->Flash->error(__('The marker could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
