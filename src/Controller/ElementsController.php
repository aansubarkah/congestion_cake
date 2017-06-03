<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Elements Controller
 *
 * @property \App\Model\Table\ElementsTable $Elements
 *
 * @method \App\Model\Entity\Element[] paginate($object = null, array $settings = [])
 */
class ElementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Users', 'Weather']
        ];
        $elements = $this->paginate($this->Elements);

        $this->set(compact('elements'));
        $this->set('_serialize', ['elements']);
    }

    /**
     * View method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $element = $this->Elements->get($id, [
            'contain' => ['Raws', 'Users', 'Weather']
        ]);

        $this->set('element', $element);
        $this->set('_serialize', ['element']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $element = $this->Elements->newEntity();
        if ($this->request->is('post')) {
            $element = $this->Elements->patchEntity($element, $this->request->getData());
            if ($this->Elements->save($element)) {
                $this->Flash->success(__('The element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The element could not be saved. Please, try again.'));
        }
        $raws = $this->Elements->Raws->find('list', ['limit' => 200]);
        $users = $this->Elements->Users->find('list', ['limit' => 200]);
        $weather = $this->Elements->Weather->find('list', ['limit' => 200]);
        $this->set(compact('element', 'raws', 'users', 'weather'));
        $this->set('_serialize', ['element']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $element = $this->Elements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $element = $this->Elements->patchEntity($element, $this->request->getData());
            if ($this->Elements->save($element)) {
                $this->Flash->success(__('The element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The element could not be saved. Please, try again.'));
        }
        $raws = $this->Elements->Raws->find('list', ['limit' => 200]);
        $users = $this->Elements->Users->find('list', ['limit' => 200]);
        $weather = $this->Elements->Weather->find('list', ['limit' => 200]);
        $this->set(compact('element', 'raws', 'users', 'weather'));
        $this->set('_serialize', ['element']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Element id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $element = $this->Elements->get($id);
        if ($this->Elements->delete($element)) {
            $this->Flash->success(__('The element has been deleted.'));
        } else {
            $this->Flash->error(__('The element could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
