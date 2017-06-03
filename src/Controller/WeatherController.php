<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Weather Controller
 *
 * @property \App\Model\Table\WeatherTable $Weather
 *
 * @method \App\Model\Entity\Weather[] paginate($object = null, array $settings = [])
 */
class WeatherController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $weather = $this->paginate($this->Weather);

        $this->set(compact('weather'));
        $this->set('_serialize', ['weather']);
    }

    /**
     * View method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $weather = $this->Weather->get($id, [
            'contain' => ['Elements', 'Humans', 'Machines', 'Markers']
        ]);

        $this->set('weather', $weather);
        $this->set('_serialize', ['weather']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $weather = $this->Weather->newEntity();
        if ($this->request->is('post')) {
            $weather = $this->Weather->patchEntity($weather, $this->request->getData());
            if ($this->Weather->save($weather)) {
                $this->Flash->success(__('The weather has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather could not be saved. Please, try again.'));
        }
        $this->set(compact('weather'));
        $this->set('_serialize', ['weather']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $weather = $this->Weather->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $weather = $this->Weather->patchEntity($weather, $this->request->getData());
            if ($this->Weather->save($weather)) {
                $this->Flash->success(__('The weather has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The weather could not be saved. Please, try again.'));
        }
        $this->set(compact('weather'));
        $this->set('_serialize', ['weather']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Weather id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $weather = $this->Weather->get($id);
        if ($this->Weather->delete($weather)) {
            $this->Flash->success(__('The weather has been deleted.'));
        } else {
            $this->Flash->error(__('The weather could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
