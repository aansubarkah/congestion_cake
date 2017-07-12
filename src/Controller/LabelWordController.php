<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * LabelWord Controller
 *
 * @property \App\Model\Table\LabelWordTable $LabelWord
 *
 * @method \App\Model\Entity\LabelWord[] paginate($object = null, array $settings = [])
 */
class LabelWordController extends AppController
{
    public $title = 'Tagging';
    public $limit = 10;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['label-word', 'Tagging']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $allNewSyllable = null;
        $allNewTag = null;
        if ($this->request->is('post'))
        {
            $allNewSyllable = explode(',', $this->request->getData('new_syllable_ids'));
            $allNewTag = explode(',', $this->request->getData('new_tag_ids'));
            $allOks = explode(',', $this->request->getData('all_oks'));

            if (!empty($allOks))
            {
                // update syllable, raws, words
                foreach ($allOks as $value)
                {
                    $query = $this->LabelWord->DataTwitter->Raws->Syllables->query();
                    $query->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();

                    // Update Raw
                    $Raw = TableRegistry::get('Raws');
                    $queryUpdateRaw = $Raw->query();
                    $Word = TableRegistry::get('Words');
                    $queryUpdateWord = $Word->query();

                    $queryUpdateRaw->update()
                        ->set(['tagging' => true])
                        ->where(['id' => $value])
                        ->execute();
                    // Update Word
                    $queryUpdateWord->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();
                }
            }

            if (!empty($allNewSyllable))
            {
                $data = [];
                $rawIds = [];
                for ($i = 0; $i < count($allNewSyllable); $i++)
                {
                    $query = $this->LabelWord->DataTwitter->Raws->Syllables->query();
                    $query->update()
                        ->set([
                            'tag_id' => $allNewTag[$i],
                            'user_id' => 1
                        ])
                        ->where(['id' => $allNewSyllable[$i]])
                        ->execute();
                    // get raw_id
                    $rawId = $this->LabelWord->DataTwitter->Raws->Syllables->get($allNewSyllable[$i]);
                    array_push($rawIds, $rawId['raw_id']);
                }

                // remove duplicates from raw_id array
                $rawIds = array_unique($rawIds);
                // update syllable, raws, words
                foreach ($rawIds as $value)
                {
                    $query = $this->LabelWord->DataTwitter->Raws->Syllables->query();
                    $query->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();

                    // Update Raw
                    $Raw = TableRegistry::get('Raws');
                    $queryUpdateRaw = $Raw->query();
                    $Word = TableRegistry::get('Words');
                    $queryUpdateWord = $Word->query();

                    $queryUpdateRaw->update()
                        ->set(['tagging' => true])
                        ->where(['id' => $value])
                        ->execute();
                    // Update Word
                    $queryUpdateWord->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();
                }
            }
            // redirect to uri
            return $this->redirect($this->referer());
        }

        $Tags = TableRegistry::get('Tags');
        $tags = $Tags->find('all', [
            'order' => ['Tags.name']
        ]);
        $respondents = $this->LabelWord->DataTwitter->Respondents->find('all', [
            'conditions' => [
                'Respondents.official' => true,
                'Respondents.t_user_id IS NOT' => null,
                'Respondents.id !=' => 11,
                'OR' => [
                    'Respondents.active' => true,
                    //'Respondents.tmc' => true
                ]
            ],
            'order' => ['Respondents.name']
        ]);

        /*$respondents = $this->LabelWord->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.t_user_id IS NOT' => null, 'Respondents.id !=' => 11],
            'order' => ['Respondents.name']
        ]);*/

        $query = $this->LabelWord->DataTwitter->find('all');
        $query->where(['DataTwitter.tagging' => false, 'DataTwitter.mt_classification_id' => 1]);
        $query->contain([
            'LabelWord' => [
                'sort' => ['LabelWord.sequence' => 'ASC']
            ]
        ]);

        $start = '';
        $end = '';
        $respondent_id = 0;
        if ($this->request->query('start') && $this->request->query('end'))
        {
            $start = new Date($this->request->query('start'));
            $startDisplay = $start;
            //$start->subDay(1);
            $start = $start->format('Y-m-d');
            $end = new Date($this->request->query('end'));
            $endDisplay = $end;
            $end->addDay(1);
            $end = $end->format('Y-m-d');
            $query->andWhere(['DataTwitter.t_time >' => $start]);
            $query->andWhere(['DataTwitter.t_time <' => $end]);
            //$startDisplay->addDay(1);
            $endDisplay->subDay(1);
            $start = $startDisplay->format('d-m-Y');
            $end = $endDisplay->format('d-m-Y');
        }
        if ($this->request->query('sort'))
        {
            $query->order([
                $this->request->query('sort') => $this->request->query('direction')
            ]);
        }
        if ($this->request->query('respondent') && $this->request->query('respondent') > 0)
        {
            $respondent_id = $this->request->query('respondent');
            $query->andWhere(['respondent_id' => $respondent_id]);
        }

        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact(['data','tags', 'respondents', 'start', 'end', 'respondent_id', 'count']));
        $this->set('_serialize', ['data', 'tags', 'respondents']);
    }

    /**
     * View method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $labelWord = $this->LabelWord->get($id, [
            'contain' => ['Raws', 'Syllables', 'Tags']
        ]);

        $this->set('labelWord', $labelWord);
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $labelWord = $this->LabelWord->newEntity();
        if ($this->request->is('post')) {
            $labelWord = $this->LabelWord->patchEntity($labelWord, $this->request->getData());
            if ($this->LabelWord->save($labelWord)) {
                $this->Flash->success(__('The label word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label word could not be saved. Please, try again.'));
        }
        $raws = $this->LabelWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->LabelWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->LabelWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('labelWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $labelWord = $this->LabelWord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $labelWord = $this->LabelWord->patchEntity($labelWord, $this->request->getData());
            if ($this->LabelWord->save($labelWord)) {
                $this->Flash->success(__('The label word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The label word could not be saved. Please, try again.'));
        }
        $raws = $this->LabelWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->LabelWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->LabelWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('labelWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['labelWord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Label Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $labelWord = $this->LabelWord->get($id);
        if ($this->LabelWord->delete($labelWord)) {
            $this->Flash->success(__('The label word has been deleted.'));
        } else {
            $this->Flash->error(__('The label word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
