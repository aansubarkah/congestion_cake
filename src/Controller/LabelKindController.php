<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LabelKind Controller
 *
 * @property \App\Model\Table\LabelKindTable $LabelKind
 *
 * @method \App\Model\Entity\LabelKind[] paginate($object = null, array $settings = [])
 */
class LabelKindController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Kinds', 'AtClassifications', 'Denominations', 'MtClassifications', 'Classifications', 'Respondents']
        ];
        $labelKind = $this->paginate($this->LabelKind);

        $this->set(compact('labelKind'));
        $this->set('_serialize', ['labelKind']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Kind id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelKind = $this->LabelKind->get($id, [
            'contain' => ['Raws', 'Kinds', 'AtClassifications', 'Denominations', 'MtClassifications', 'Classifications', 'Respondents']
        ]);

        $this->set('labelKind', $labelKind);
        $this->set('_serialize', ['labelKind']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelKind = $this->LabelKind->newEntity();
        if ($this->request->is('post')) {
            $labelKind = $this->LabelKind->patchEntity($labelKind, $this->request->getData());
            if ($this->LabelKind->save($labelKind)) {
                $this->Flash->success(__('The label kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label kind could not be saved. Please, try again.'));
        }
        $raws = $this->LabelKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->LabelKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->LabelKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->LabelKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->LabelKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->LabelKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->LabelKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('labelKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['labelKind']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Kind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelKind = $this->LabelKind->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelKind = $this->LabelKind->patchEntity($labelKind, $this->request->getData());
            if ($this->LabelKind->save($labelKind)) {
                $this->Flash->success(__('The label kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label kind could not be saved. Please, try again.'));
        }
        $raws = $this->LabelKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->LabelKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->LabelKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->LabelKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->LabelKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->LabelKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->LabelKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('labelKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['labelKind']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Kind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelKind = $this->LabelKind->get($id);
        if ($this->LabelKind->delete($labelKind)) {
            $this->Flash->success(__('The label kind has been deleted.'));
        } else {
            $this->Flash->error(__('The label kind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
