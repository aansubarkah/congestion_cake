<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * LabelSpot Controller
 *
 * @property \App\Model\Table\LabelSpotTable $LabelSpot
 *
 * @method \App\Model\Entity\LabelSpot[] paginate($object = null, array $settings = [])
 */
class LabelSpotController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Raws', 'Respondents', 'Pieces', 'Spaces', 'Places', 'Regencies', 'Hierarchies', 'Categories', 'Weather']
        ];
        $labelSpot = $this->paginate($this->LabelSpot);

        $this->set(compact('labelSpot'));
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelSpot = $this->LabelSpot->get($id, [
            'contain' => ['Raws', 'Respondents', 'Pieces', 'Spaces', 'Places', 'Regencies', 'Hierarchies', 'Categories', 'Weather']
        ]);

        $this->set('labelSpot', $labelSpot);
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelSpot = $this->LabelSpot->newEntity();
        if ($this->request->is('post')) {
            $labelSpot = $this->LabelSpot->patchEntity($labelSpot, $this->request->getData());
            if ($this->LabelSpot->save($labelSpot)) {
                $this->Flash->success(__('The label spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label spot could not be saved. Please, try again.'));
        }
        $raws = $this->LabelSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelSpot->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelSpot->Pieces->find('list', ['limit' => 200]);
        $spaces = $this->LabelSpot->Spaces->find('list', ['limit' => 200]);
        $places = $this->LabelSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->LabelSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->LabelSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->LabelSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->LabelSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('labelSpot', 'raws', 'respondents', 'pieces', 'spaces', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelSpot = $this->LabelSpot->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelSpot = $this->LabelSpot->patchEntity($labelSpot, $this->request->getData());
            if ($this->LabelSpot->save($labelSpot)) {
                $this->Flash->success(__('The label spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label spot could not be saved. Please, try again.'));
        }
        $raws = $this->LabelSpot->Raws->find('list', ['limit' => 200]);
        $respondents = $this->LabelSpot->Respondents->find('list', ['limit' => 200]);
        $pieces = $this->LabelSpot->Pieces->find('list', ['limit' => 200]);
        $spaces = $this->LabelSpot->Spaces->find('list', ['limit' => 200]);
        $places = $this->LabelSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->LabelSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->LabelSpot->Hierarchies->find('list', ['limit' => 200]);
        $categories = $this->LabelSpot->Categories->find('list', ['limit' => 200]);
        $weather = $this->LabelSpot->Weather->find('list', ['limit' => 200]);
        $this->set(compact('labelSpot', 'raws', 'respondents', 'pieces', 'spaces', 'places', 'regencies', 'hierarchies', 'categories', 'weather'));
        $this->set('_serialize', ['labelSpot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Spot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelSpot = $this->LabelSpot->get($id);
        if ($this->LabelSpot->delete($labelSpot)) {
            $this->Flash->success(__('The label spot has been deleted.'));
        } else {
            $this->Flash->error(__('The label spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
