<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;
/**
 * LabelKind Controller
 *
 * @property \App\Model\Table\LabelKindTable $LabelKind
 *
 * @method \App\Model\Entity\LabelKind[] paginate($object = null, array $settings = [])
 */
class LabelKindController extends AppController
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
                    // Update Raw
                    $Raw = TableRegistry::get('Raws');
                    $queryUpdateRaw = $Raw->query();
                    $Kind = TableRegistry::get('Kinds');
                    $queryUpdateKind = $Kind->query();

                    $queryUpdateRaw->update()
                        ->set(['classifying' => true])
                        ->where(['id' => $value])
                        ->execute();
                    // Update Kind
                    $queryUpdateKind->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();

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
                    // Update Raw
                    $Raw = TableRegistry::get('Raws');
                    $queryUpdateRaw = $Raw->query();
                    $Kind = TableRegistry::get('Kinds');
                    $queryUpdateKind = $Kind->query();

                    $queryUpdateRaw->update()
                        ->set(['classifying' => true])
                        ->where(['id' => $value])
                        ->execute();
                    // Update Kind
                    $queryUpdateKind->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();
                }
                $label = TableRegistry::get('Denominations');
                $entities = $label->newEntities($data);
                $result = $label->saveMany($entities);
            }
        }

        $respondents = $this->LabelKind->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.active' => true],
            'order' => ['Respondents.name']
        ]);

        $query = $this->LabelKind->DataTwitter->find('all', [
            'conditions' => ['DataTwitter.classifying' => false],
            'contain' => ['LabelKind']
        ]);
        if ($this->request->query('start') && $this->request->query('end'))
        {
            $start = new Date($this->request->query('start'));
            //$start
            $query->where(['DataTwitter.t_time' => ])
            //$query->where(['LOWER(info) LIKE' => '%' . strtolower($this->request->query('search')) . '%']);
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
        $this->set(compact(['data', 'respondents']));
        //$this->set(compact('respondents'));
        $this->set('_serialize', ['data', 'respondents']);
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

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }

}
