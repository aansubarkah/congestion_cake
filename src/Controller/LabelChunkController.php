<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LabelChunk Controller
 *
 * @property \App\Model\Table\LabelChunkTable $LabelChunk
 *
 * @method \App\Model\Entity\LabelChunk[] paginate($object = null, array $settings = [])
 */
class LabelChunkController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Respondents', 'Pieces']
        ];
        $labelChunk = $this->paginate($this->LabelChunk);

        $this->set(compact('labelChunk'));
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelChunk = $this->LabelChunk->get($id, [
            'contain' => ['Raws', 'Respondents', 'Pieces']
        ]);

        $this->set('labelChunk', $labelChunk);
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelChunk = $this->LabelChunk->newEntity();
        if ($this->request->is('post')) {
            $labelChunk = $this->LabelChunk->patchEntity($labelChunk, $this->request->getData());
            if ($this->LabelChunk->save($labelChunk)) {
                $this->Flash->success(__('The label chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label chunk could not be saved. Please, try again.'));
        }
        $raws = $this->LabelChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelChunk->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelChunk->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('labelChunk', 'raws', 'respondents', 'pieces'));
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelChunk = $this->LabelChunk->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelChunk = $this->LabelChunk->patchEntity($labelChunk, $this->request->getData());
            if ($this->LabelChunk->save($labelChunk)) {
                $this->Flash->success(__('The label chunk has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label chunk could not be saved. Please, try again.'));
        }
        $raws = $this->LabelChunk->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelChunk->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelChunk->Pieces->find('list', ['limit' => 200]);
        $this->set(compact('labelChunk', 'raws', 'respondents', 'pieces'));
        $this->set('_serialize', ['labelChunk']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Chunk id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelChunk = $this->LabelChunk->get($id);
        if ($this->LabelChunk->delete($labelChunk)) {
            $this->Flash->success(__('The label chunk has been deleted.'));
        } else {
            $this->Flash->error(__('The label chunk could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
