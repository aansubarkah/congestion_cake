<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Raws Controller
 *
 * @property \App\Model\Table\RawsTable $Raws
 *
 * @method \App\Model\Entity\Raw[] paginate($object = null, array $settings = [])
 */
class RawsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Respondents']
        ];
        $raws = $this->paginate($this->Raws);

        $this->set(compact('raws'));
        $this->set('_serialize', ['raws']);
    }

    /**
     * View method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => ['Respondents', 'Claps', 'Denominations', 'Elements', 'Fails', 'Kinds', 'Locations', 'Markers', 'Reviews']
        ]);

        $this->set('raw', $raw);
        $this->set('_serialize', ['raw']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $raw = $this->Raws->newEntity();
        if ($this->request->is('post')) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $respondents = $this->Raws->Respondents->find('list', ['limit' => 200]);
        $ts = $this->Raws->Ts->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'respondents', 'ts'));
        $this->set('_serialize', ['raw']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $raw = $this->Raws->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $raw = $this->Raws->patchEntity($raw, $this->request->getData());
            if ($this->Raws->save($raw)) {
                $this->Flash->success(__('The raw has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raw could not be saved. Please, try again.'));
        }
        $respondents = $this->Raws->Respondents->find('list', ['limit' => 200]);
        $ts = $this->Raws->Ts->find('list', ['limit' => 200]);
        $this->set(compact('raw', 'respondents', 'ts'));
        $this->set('_serialize', ['raw']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Raw id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $raw = $this->Raws->get($id);
        if ($this->Raws->delete($raw)) {
            $this->Flash->success(__('The raw has been deleted.'));
        } else {
            $this->Flash->error(__('The raw could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
