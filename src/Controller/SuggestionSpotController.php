<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SuggestionSpot Controller
 *
 * @property \App\Model\Table\SuggestionSpotTable $SuggestionSpot
 *
 * @method \App\Model\Entity\SuggestionSpot[] paginate($object = null, array $settings = [])
 */
class SuggestionSpotController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Places', 'Regencies', 'Hierarchies']
        ];
        $suggestionSpot = $this->paginate($this->SuggestionSpot);

        $this->set(compact('suggestionSpot'));
        $this->set('_serialize', ['suggestionSpot']);
    }

    /**
     * View method
     *
     * @param string|null $id Suggestion Spot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($q)
    {
        $data = [];
        if (!empty($q))
        {
            $query = $this->SuggestionSpot->find();
            $query->where(['LOWER(place_name) LIKE' => '%' . strtolower($q) . '%']);

            foreach ($query as $value)
            {
                array_push($data, [
                    'id' => $value->place_id,
                    'value' => $value->place_name . ', ' . $value->hierarchy_name . ' ' . $value->regency_name,
                    'lat' => $value->lat,
                    'lng' => $value->lng
                ]);
            }
        }
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suggestionSpot = $this->SuggestionSpot->newEntity();
        if ($this->request->is('post')) {
            $suggestionSpot = $this->SuggestionSpot->patchEntity($suggestionSpot, $this->request->getData());
            if ($this->SuggestionSpot->save($suggestionSpot)) {
                $this->Flash->success(__('The suggestion spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suggestion spot could not be saved. Please, try again.'));
        }
        $places = $this->SuggestionSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->SuggestionSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->SuggestionSpot->Hierarchies->find('list', ['limit' => 200]);
        $this->set(compact('suggestionSpot', 'places', 'regencies', 'hierarchies'));
        $this->set('_serialize', ['suggestionSpot']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suggestion Spot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suggestionSpot = $this->SuggestionSpot->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suggestionSpot = $this->SuggestionSpot->patchEntity($suggestionSpot, $this->request->getData());
            if ($this->SuggestionSpot->save($suggestionSpot)) {
                $this->Flash->success(__('The suggestion spot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suggestion spot could not be saved. Please, try again.'));
        }
        $places = $this->SuggestionSpot->Places->find('list', ['limit' => 200]);
        $regencies = $this->SuggestionSpot->Regencies->find('list', ['limit' => 200]);
        $hierarchies = $this->SuggestionSpot->Hierarchies->find('list', ['limit' => 200]);
        $this->set(compact('suggestionSpot', 'places', 'regencies', 'hierarchies'));
        $this->set('_serialize', ['suggestionSpot']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suggestion Spot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suggestionSpot = $this->SuggestionSpot->get($id);
        if ($this->SuggestionSpot->delete($suggestionSpot)) {
            $this->Flash->success(__('The suggestion spot has been deleted.'));
        } else {
            $this->Flash->error(__('The suggestion spot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
