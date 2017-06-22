<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DataKind Controller
 *
 * @property \App\Model\Table\DataKindTable $DataKind
 *
 * @method \App\Model\Entity\DataKind[] paginate($object = null, array $settings = [])
 */
class DataKindController extends AppController
{
    public $title = 'Classifying';
    public $limit = 5;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['raws', 'Twitter']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $allRelevant = null;
        $allNotRelevant = null;
        if ($this->request->is('post')) {
            $allRelevant = explode(',', $this->request->getData('all_relevant'));
            $allNotRelevant = explode(',', $this->request->getData('all_not_relevant'));

            if (!empty($allRelevant))
            {
                $data = [];
                foreach ($allRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 1,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }

            if (!empty($allNotRelevant))
            {
                $data = [];
                foreach ($allNotRelevant as $value)
                {
                    array_push($data, [
                        'raw_id' => $value,
                        'classification_id' => 2,
                        'user_id' => 1,
                        'trained' => false,
                        'active' => true
                    ]);
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }
        }

        $query = $this->DataKind->find('all', [
        ]);
        if ($this->request->query('search'))
        {
            $query->where(['LOWER(info) LIKE' => '%' . strtolower($this->request->query('search')) . '%']);
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', 'Classifying');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    /**
     * View method
     *
     * @param string|null $id Data Kind id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataKind = $this->DataKind->get($id, [
            'contain' => ['Raws', 'Kinds', 'AtClassifications', 'Denominations', 'MtClassifications', 'Classifications', 'Respondents']
        ]);

        $this->set('dataKind', $dataKind);
        $this->set('_serialize', ['dataKind']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataKind = $this->DataKind->newEntity();
        if ($this->request->is('post')) {
            $dataKind = $this->DataKind->patchEntity($dataKind, $this->request->getData());
            if ($this->DataKind->save($dataKind)) {
                $this->Flash->success(__('The data kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data kind could not be saved. Please, try again.'));
        }
        $raws = $this->DataKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->DataKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->DataKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->DataKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->DataKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->DataKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('dataKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['dataKind']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Kind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataKind = $this->DataKind->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataKind = $this->DataKind->patchEntity($dataKind, $this->request->getData());
            if ($this->DataKind->save($dataKind)) {
                $this->Flash->success(__('The data kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data kind could not be saved. Please, try again.'));
        }
        $raws = $this->DataKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->DataKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->DataKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->DataKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->DataKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->DataKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('dataKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['dataKind']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Kind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataKind = $this->DataKind->get($id);
        if ($this->DataKind->delete($dataKind)) {
            $this->Flash->success(__('The data kind has been deleted.'));
        } else {
            $this->Flash->error(__('The data kind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
