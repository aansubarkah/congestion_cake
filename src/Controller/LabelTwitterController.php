<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * LabelTwitter Controller
 *
 * @property \App\Model\Table\LabelTwitterTable $LabelTwitter
 *
 * @method \App\Model\Entity\LabelTwitter[] paginate($object = null, array $settings = [])
 */
class LabelTwitterController extends AppController
{
    public $title = 'Twitter';
    public $limit = 10;

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
        $query = $this->LabelTwitter->find('all', [
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

        $breadcrumbs = [
            ['raws', 'Twitter'],
            ['raws/label', 'Label']
        ];
        $this->set('breadcrumbs', $breadcrumbs);

        $labels = $this->paginate($query);
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('labels'));
        $this->set('_serialize', ['labels']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Twitter id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelTwitter = $this->LabelTwitter->get($id, [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Respondents']
        ]);

        $this->set('labelTwitter', $labelTwitter);
        $this->set('_serialize', ['labelTwitter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelTwitter = $this->LabelTwitter->newEntity();
        if ($this->request->is('post')) {
            $labelTwitter = $this->LabelTwitter->patchEntity($labelTwitter, $this->request->getData());
            if ($this->LabelTwitter->save($labelTwitter)) {
                $this->Flash->success(__('The label twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label twitter could not be saved. Please, try again.'));
        }
        $raws = $this->LabelTwitter->Raws->find('list', ['limit' => 200]);
        $kinds = $this->LabelTwitter->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->LabelTwitter->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->LabelTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('labelTwitter', 'raws', 'kinds', 'classifications', 'respondents'));
        $this->set('_serialize', ['labelTwitter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Twitter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelTwitter = $this->LabelTwitter->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelTwitter = $this->LabelTwitter->patchEntity($labelTwitter, $this->request->getData());
            if ($this->LabelTwitter->save($labelTwitter)) {
                $this->Flash->success(__('The label twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label twitter could not be saved. Please, try again.'));
        }
        $raws = $this->LabelTwitter->Raws->find('list', ['limit' => 200]);
        $kinds = $this->LabelTwitter->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->LabelTwitter->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->LabelTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('labelTwitter', 'raws', 'kinds', 'classifications', 'respondents'));
        $this->set('_serialize', ['labelTwitter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Twitter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelTwitter = $this->LabelTwitter->get($id);
        if ($this->LabelTwitter->delete($labelTwitter)) {
            $this->Flash->success(__('The label twitter has been deleted.'));
        } else {
            $this->Flash->error(__('The label twitter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }

}
