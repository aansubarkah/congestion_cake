<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LabelWord Controller
 *
 * @property \App\Model\Table\LabelWordTable $LabelWord
 *
 * @method \App\Model\Entity\LabelWord[] paginate($object = null, array $settings = [])
 */
class LabelWordController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Syllables', 'Tags']
        ];
        $labelWord = $this->paginate($this->LabelWord);

        $this->set(compact('labelWord'));
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelWord = $this->LabelWord->get($id, [
            'contain' => ['Raws', 'Syllables', 'Tags']
        ]);

        $this->set('labelWord', $labelWord);
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelWord = $this->LabelWord->newEntity();
        if ($this->request->is('post')) {
            $labelWord = $this->LabelWord->patchEntity($labelWord, $this->request->getData());
            if ($this->LabelWord->save($labelWord)) {
                $this->Flash->success(__('The label word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label word could not be saved. Please, try again.'));
        }
        $raws = $this->LabelWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->LabelWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->LabelWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('labelWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelWord = $this->LabelWord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelWord = $this->LabelWord->patchEntity($labelWord, $this->request->getData());
            if ($this->LabelWord->save($labelWord)) {
                $this->Flash->success(__('The label word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label word could not be saved. Please, try again.'));
        }
        $raws = $this->LabelWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->LabelWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->LabelWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('labelWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelWord = $this->LabelWord->get($id);
        if ($this->LabelWord->delete($labelWord)) {
            $this->Flash->success(__('The label word has been deleted.'));
        } else {
            $this->Flash->error(__('The label word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
