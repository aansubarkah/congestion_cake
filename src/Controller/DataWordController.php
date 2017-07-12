<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * DataWord Controller
 *
 * @property \App\Model\Table\DataWordTable $DataWord
 *
 * @method \App\Model\Entity\DataWord[] paginate($object = null, array $settings = [])
 */
class DataWordController extends AppController
{
    public $title = 'Tagging';
    public $limit = 200;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['data-word', 'Tagging']
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

            if (!empty($allNewSyllable))
            {
                $data = [];
                $rawIds = [];
                for ($i = 0; $i < count($allNewSyllable); $i++)
                {
                    $query = $this->DataWord->Raws->Syllables->query();
                    $query->update()
                        ->set([
                            'tag_id' => $allNewTag[$i],
                            'user_id' => 1
                        ])
                        ->where(['id' => $allNewSyllable[$i]])
                        ->execute();
                    // get raw_id
                    $rawId = $this->DataWord->Raws->Syllables->get($allNewSyllable[$i]);
                    array_push($rawIds, $rawId['raw_id']);
                }

                // remove duplicates from raw_id array
                $rawIds = array_unique($rawIds);
                // update syllable
                foreach ($rawIds as $value)
                {
                    $query = $this->DataWord->Raws->Syllables->query();
                    $query->update()
                        ->set(['verified' => true])
                        ->where(['raw_id' => $value])
                        ->execute();
                }
            }
        }
        $Tags = TableRegistry::get('Tags');
        $tags = $Tags->find('all', [
            'order' => ['Tags.name']
        ]);
        $respondents = $this->DataWord->DataTwitter->Respondents->find('all', [
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

        $query = $this->DataWord->DataTwitter->find('all');
        $query->where(['DataTwitter.tagging' => false, 'DataTwitter.at_classification_id' => 1]);
        $query->contain([
            'DataWord' => [
                'sort' => ['DataWord.sequence' => 'ASC']
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

        /*$tags = $this->DataWord->Tags->find('all', [
            'order' => ['Tags.name']
        ]);

        $query = $this->DataWord->Raws->Kinds->find('all', [
            'contain' => [
                'Raws',
                'Raws.DataWord' => ['sort' => ['DataWord.sequence' => 'ASC']],
                'Raws.DataSyllable' => ['sort' => ['DataSyllable.sequence' => 'ASC']],
            ],
            'conditions' => ['Kinds.classification_id' => 1]
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
        } else {
            $query->order(['t_time DESC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', $this->title);
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('tags', $tags);
        $this->set('_serialize', ['data', 'tags']);*/
    }

    /**
     * View method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dataWord = $this->DataWord->get($id, [
            'contain' => ['Raws', 'Kinds', 'Classifications', 'Words', 'Tags']
        ]);

        $this->set('dataWord', $dataWord);
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dataWord = $this->DataWord->newEntity();
        if ($this->request->is('post')) {
            $dataWord = $this->DataWord->patchEntity($dataWord, $this->request->getData());
            if ($this->DataWord->save($dataWord)) {
                $this->Flash->success(__('The data word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data word could not be saved. Please, try again.'));
        }
        $raws = $this->DataWord->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataWord->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataWord->Classifications->find('list', ['limit' => 200]);
        $words = $this->DataWord->Words->find('list', ['limit' => 200]);
        $tags = $this->DataWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataWord', 'raws', 'kinds', 'classifications', 'words', 'tags'));
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dataWord = $this->DataWord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dataWord = $this->DataWord->patchEntity($dataWord, $this->request->getData());
            if ($this->DataWord->save($dataWord)) {
                $this->Flash->success(__('The data word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The data word could not be saved. Please, try again.'));
        }
        $raws = $this->DataWord->Raws->find('list', ['limit' => 200]);
        $kinds = $this->DataWord->Kinds->find('list', ['limit' => 200]);
        $classifications = $this->DataWord->Classifications->find('list', ['limit' => 200]);
        $words = $this->DataWord->Words->find('list', ['limit' => 200]);
        $tags = $this->DataWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('dataWord', 'raws', 'kinds', 'classifications', 'words', 'tags'));
        $this->set('_serialize', ['dataWord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Data Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dataWord = $this->DataWord->get($id);
        if ($this->DataWord->delete($dataWord)) {
            $this->Flash->success(__('The data word has been deleted.'));
        } else {
            $this->Flash->error(__('The data word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
