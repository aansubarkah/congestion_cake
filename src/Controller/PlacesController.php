<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Places Controller
 *
 * @property \App\Model\Table\PlacesTable $Places
 *
 * @method \App\Model\Entity\Place[] paginate($object = null, array $settings = [])
 */
class PlacesController extends AppController
{
    public $title = 'Location';
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['places', 'Location']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $Spot = TableRegistry::get('SuggestionSpot');
        $query = $Spot->find('all');
        if ($this->request->query('search'))
        {
            $query->where(['LOWER(place_fullname) LIKE' => '%' . strtolower($this->request->query('search')) . '%']);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        } else {
            $query->order(['place_fullname ASC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);

        /*$this->paginate = [
            'contain' => ['Regencies']
        ];
        $places = $this->paginate($this->Places);

        $this->set(compact('places'));
        $this->set('_serialize', ['places']);*/
    }

    /**
     * View method
     *
     * @param string|null $id Place id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $place = $this->Places->get($id, [
            'contain' => ['Regencies', 'Humans', 'Machines', 'Spaces', 'Spots']
        ]);

        $this->set('place', $place);
        $this->set('_serialize', ['place']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $place = $this->Places->newEntity();
        if ($this->request->is('post')) {
            $place = $this->Places->patchEntity($place, $this->request->getData());
            if ($this->Places->save($place)) {
                $this->Flash->success(__('The place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The place could not be saved. Please, try again.'));
        }
        $regencies = $this->Places->Regencies->find('list', ['limit' => 200]);
        $this->set(compact('place', 'regencies'));
        $this->set('_serialize', ['place']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Place id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $place = $this->Places->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $place = $this->Places->patchEntity($place, $this->request->getData());
            if ($this->Places->save($place)) {
                $this->Flash->success(__('The place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The place could not be saved. Please, try again.'));
        }
        $regencies = $this->Places->Regencies->find('list', ['limit' => 200]);
        $this->set(compact('place', 'regencies'));
        $this->set('_serialize', ['place']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Place id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $place = $this->Places->get($id);
        if ($this->Places->delete($place)) {
            $this->Flash->success(__('The place has been deleted.'));
        } else {
            $this->Flash->error(__('The place could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
