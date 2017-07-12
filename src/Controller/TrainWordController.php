<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * TrainWord Controller
 *
 * @property \App\Model\Table\TrainWordTable $TrainWord
 *
 * @method \App\Model\Entity\TrainWord[] paginate($object = null, array $settings = [])
 */
class TrainWordController extends AppController
{
    public $title = 'Tagging';
    public $limit = 5;

    /*
     * breadcrumbs variable, format like
     * [['link 1', 'link title 1'], ['link 2', 'link title 2']]
     *
     * */
    public $breadcrumbs = [
        ['train-word', 'Tagging']
    ];

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        /*$Tags = TableRegistry::get('Tags');
        $tags = $Tags->find('all', [
            'order' => ['Tags.name']
        ]);*/
        $respondents = $this->TrainWord->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.t_user_id IS NOT' => null, 'Respondents.id !=' => 11],
            'order' => ['Respondents.name']
        ]);

        $query = $this->TrainWord->DataTwitter->find('all');
        $query->where(['DataTwitter.tagging' => true]);
        $query->contain([
            'TrainWord' => [
                'sort' => ['TrainWord.sequence' => 'ASC']
            ]
        ]);

        $start = '';
        $end = '';
        $respondent_id = 0;
        if ($this->request->query('start') && $this->request->query('end'))
        {
            $start = new Date($this->request->query('start'));
            $startDisplay = $start;
            $start->subDay(1);
            $start = $start->format('Y-m-d');
            $end = new Date($this->request->query('end'));
            $endDisplay = $end;
            $end->addDay(1);
            $end = $end->format('Y-m-d');
            $query->andWhere(['DataTwitter.t_time >' => $start]);
            $query->andWhere(['DataTwitter.t_time <' => $end]);
            $startDisplay->addDay(1);
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
        $this->set(compact(['data', 'respondents', 'start', 'end', 'respondent_id', 'count']));
        $this->set('_serialize', ['data','respondents']);
    }

    /**
     * View method
     *
     * @param string|null $id Train Word id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainWord = $this->TrainWord->get($id, [
            'contain' => ['Raws', 'Syllables', 'Tags']
        ]);

        $this->set('trainWord', $trainWord);
        $this->set('_serialize', ['trainWord']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainWord = $this->TrainWord->newEntity();
        if ($this->request->is('post')) {
            $trainWord = $this->TrainWord->patchEntity($trainWord, $this->request->getData());
            if ($this->TrainWord->save($trainWord)) {
                $this->Flash->success(__('The train word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train word could not be saved. Please, try again.'));
        }
        $raws = $this->TrainWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->TrainWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->TrainWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('trainWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['trainWord']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Train Word id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainWord = $this->TrainWord->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainWord = $this->TrainWord->patchEntity($trainWord, $this->request->getData());
            if ($this->TrainWord->save($trainWord)) {
                $this->Flash->success(__('The train word has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train word could not be saved. Please, try again.'));
        }
        $raws = $this->TrainWord->Raws->find('list', ['limit' => 200]);
        $syllables = $this->TrainWord->Syllables->find('list', ['limit' => 200]);
        $tags = $this->TrainWord->Tags->find('list', ['limit' => 200]);
        $this->set(compact('trainWord', 'raws', 'syllables', 'tags'));
        $this->set('_serialize', ['trainWord']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Train Word id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainWord = $this->TrainWord->get($id);
        if ($this->TrainWord->delete($trainWord)) {
            $this->Flash->success(__('The train word has been deleted.'));
        } else {
            $this->Flash->error(__('The train word could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
