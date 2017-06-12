<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DataPiece Controller
 *
 * @property \App\Model\Table\DataPieceTable $DataPiece
 *
 * @method \App\Model\Entity\DataPiece[] paginate($object = null, array $settings = [])
 */
class DataPieceController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Respondents', 'Pieces', 'Users']
        ];
        $dataPiece = $this->paginate($this->DataPiece);

        $this->set(compact('dataPiece'));
        $this->set('_serialize', ['dataPiece']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Piece id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataPiece = $this->DataPiece->get($id, [
            'contain' => ['Raws', 'Respondents', 'Pieces', 'Users']
        ]);

        $this->set('dataPiece', $dataPiece);
        $this->set('_serialize', ['dataPiece']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataPiece = $this->DataPiece->newEntity();
        if ($this->request->is('post')) {
            $dataPiece = $this->DataPiece->patchEntity($dataPiece, $this->request->getData());
            if ($this->DataPiece->save($dataPiece)) {
                $this->Flash->success(__('The data piece has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data piece could not be saved. Please, try again.'));
        }
        $raws = $this->DataPiece->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataPiece->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->DataPiece->Pieces->find('list', ['limit' => 200]);
        $users = $this->DataPiece->Users->find('list', ['limit' => 200]);
        $this->set(compact('dataPiece', 'raws', 'respondents', 'pieces', 'users'));
        $this->set('_serialize', ['dataPiece']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Piece id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataPiece = $this->DataPiece->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataPiece = $this->DataPiece->patchEntity($dataPiece, $this->request->getData());
            if ($this->DataPiece->save($dataPiece)) {
                $this->Flash->success(__('The data piece has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data piece could not be saved. Please, try again.'));
        }
        $raws = $this->DataPiece->Raws->find('list', ['limit' => 200]);
        $respondents = $this->DataPiece->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->DataPiece->Pieces->find('list', ['limit' => 200]);
        $users = $this->DataPiece->Users->find('list', ['limit' => 200]);
        $this->set(compact('dataPiece', 'raws', 'respondents', 'pieces', 'users'));
        $this->set('_serialize', ['dataPiece']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Piece id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataPiece = $this->DataPiece->get($id);
        if ($this->DataPiece->delete($dataPiece)) {
            $this->Flash->success(__('The data piece has been deleted.'));
        } else {
            $this->Flash->error(__('The data piece could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
