<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RegenciesRegions Controller
 *
 * @property \App\Model\Table\RegenciesRegionsTable $RegenciesRegions
 *
 * @method \App\Model\Entity\RegenciesRegion[] paginate($object = null, array $settings = [])
 */
class RegenciesRegionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Regencies', 'Regions']
        ];
        $regenciesRegions = $this->paginate($this->RegenciesRegions);

        $this->set(compact('regenciesRegions'));
        $this->set('_serialize', ['regenciesRegions']);
    }

    /**
     * View method
     *
     * @param string|null $id Regencies Region id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regenciesRegion = $this->RegenciesRegions->get($id, [
            'contain' => ['Regencies', 'Regions']
        ]);

        $this->set('regenciesRegion', $regenciesRegion);
        $this->set('_serialize', ['regenciesRegion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regenciesRegion = $this->RegenciesRegions->newEntity();
        if ($this->request->is('post')) {
            $regenciesRegion = $this->RegenciesRegions->patchEntity($regenciesRegion, $this->request->getData());
            if ($this->RegenciesRegions->save($regenciesRegion)) {
                $this->Flash->success(__('The regencies region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regencies region could not be saved. Please, try again.'));
        }
        $regencies = $this->RegenciesRegions->Regencies->find('list', ['limit' => 200]);
        $regions = $this->RegenciesRegions->Regions->find('list', ['limit' => 200]);
        $this->set(compact('regenciesRegion', 'regencies', 'regions'));
        $this->set('_serialize', ['regenciesRegion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Regencies Region id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regenciesRegion = $this->RegenciesRegions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regenciesRegion = $this->RegenciesRegions->patchEntity($regenciesRegion, $this->request->getData());
            if ($this->RegenciesRegions->save($regenciesRegion)) {
                $this->Flash->success(__('The regencies region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regencies region could not be saved. Please, try again.'));
        }
        $regencies = $this->RegenciesRegions->Regencies->find('list', ['limit' => 200]);
        $regions = $this->RegenciesRegions->Regions->find('list', ['limit' => 200]);
        $this->set(compact('regenciesRegion', 'regencies', 'regions'));
        $this->set('_serialize', ['regenciesRegion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Regencies Region id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regenciesRegion = $this->RegenciesRegions->get($id);
        if ($this->RegenciesRegions->delete($regenciesRegion)) {
            $this->Flash->success(__('The regencies region has been deleted.'));
        } else {
            $this->Flash->error(__('The regencies region could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
