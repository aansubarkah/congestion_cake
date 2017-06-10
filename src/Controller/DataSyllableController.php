<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DataSyllable Controller
 *
 * @property \App\Model\Table\DataSyllableTable $DataSyllable
 *
 * @method \App\Model\Entity\DataSyllable[] paginate($object = null, array $settings = [])
 */
class DataSyllableController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Syllables', 'Tags']
        ];
        $dataSyllable = $this->paginate($this->DataSyllable);

        $this->set(compact('dataSyllable'));
        $this->set('_serialize', ['dataSyllable']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Syllable id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataSyllable = $this->DataSyllable->get($id, [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Syllables', 'Tags']
        ]);

        $this->set('dataSyllable', $dataSyllable);
        $this->set('_serialize', ['dataSyllable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataSyllable = $this->DataSyllable->newEntity();
        if ($this->request->is('post')) {
            $dataSyllable = $this->DataSyllable->patchEntity($dataSyllable, $this->request->getData());
            if ($this->DataSyllable->save($dataSyllable)) {
                $this->Flash->success(__('The data syllable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data syllable could not be saved. Please, try again.'));
        }
        $raws = $this->DataSyllable->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataSyllable->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataSyllable->Classifications->find('list', ['limit' => 200]);
        $syllables = $this->DataSyllable->Syllables->find('list', ['limit' => 200]);
        $tags = $this->DataSyllable->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataSyllable', 'raws', 'kinds', 'classifications', 'syllables', 'tags'));
        $this->set('_serialize', ['dataSyllable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Syllable id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataSyllable = $this->DataSyllable->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataSyllable = $this->DataSyllable->patchEntity($dataSyllable, $this->request->getData());
            if ($this->DataSyllable->save($dataSyllable)) {
                $this->Flash->success(__('The data syllable has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data syllable could not be saved. Please, try again.'));
        }
        $raws = $this->DataSyllable->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataSyllable->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataSyllable->Classifications->find('list', ['limit' => 200]);
        $syllables = $this->DataSyllable->Syllables->find('list', ['limit' => 200]);
        $tags = $this->DataSyllable->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataSyllable', 'raws', 'kinds', 'classifications', 'syllables', 'tags'));
        $this->set('_serialize', ['dataSyllable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Syllable id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataSyllable = $this->DataSyllable->get($id);
        if ($this->DataSyllable->delete($dataSyllable)) {
            $this->Flash->success(__('The data syllable has been deleted.'));
        } else {
            $this->Flash->error(__('The data syllable could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
