<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Date;

/**
 * TrainKind Controller
 *
 * @property \App\Model\Table\TrainKindTable $TrainKind
 *
 * @method \App\Model\Entity\TrainKind[] paginate($object = null, array $settings = [])
 */
class TrainKindController extends AppController
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
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post'))
        {
            $begin = $this->request->getData('start_train');
            $end = $this->request->getData('end_train');
            $account = $this->request->getData('respondent_train');
            $many = $this->request->getData('limit_train');

            // Insert spaces table with predefined place_id
            $command = 'cd /home/aan/congestion && python3 /home/aan/congestion/TrainKind.py ' . $begin . ' ' . $end . ' ' . $account . ' ' . $many;
            shell_exec($command);
        }

        $respondents = $this->TrainKind->DataTwitter->Respondents->find('all', [
            'conditions' => ['Respondents.official' => true, 'Respondents.t_user_id IS NOT' => null],
            'order' => ['Respondents.name']
        ]);
        $query = $this->TrainKind->find('all');
        $start = '';
        $end = '';
        $respondent_id = 0;
        $respondent_name = 'All Respondents';
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
            $query->andWhere(['TrainKind.t_time >' => $start]);
            $query->andWhere(['TrainKind.t_time <' => $end]);
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
            $Respondent = TableRegistry::get('Respondents');
            $queryRespondent = $Respondent->find('all')
                ->where(['id' => $respondent_id])
                ->first();
            $respondent_name = $queryRespondent['name'];
        }
        $this->paginate = ['limit' => $this->limit];

        $this->set('breadcrumbs', $this->breadcrumbs);
        $count = $query->count();
        $queryFirstLast = clone $query;
        $queryFirstLast->all();
        $firstData = $queryFirstLast->first();
        $lastData = $queryFirstLast->last();
        $queryHam = clone $query;
        $queryHam = $queryHam->andWhere(['TrainKind.classification_id' => 1]);
        $countHam = $queryHam->count();
        $querySpam = clone $query;
        $querySpam = $querySpam->andWhere(['TrainKind.classification_id' => 2]);
        $countSpam = $querySpam->count();
        $data = $this->paginate($query);
        $this->set('title', 'Classifying');
        $this->set('limit', $this->limit);
        $this->set(compact(['data', 'firstData', 'lastData', 'respondents', 'start', 'end', 'respondent_id', 'respondent_name', 'count', 'countHam', 'countSpam']));
        $this->set('_serialize', ['data', 'firstData', 'lastData', 'respondents']);
    }

    /**
     * View method
     *
     * @param string|null $id Train Kind id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainKind = $this->TrainKind->get($id, [
            'contain' => ['Raws', 'Kinds', 'AtClassifications', 'Denominations', 'MtClassifications', 'Classifications', 'Respondents']
        ]);

        $this->set('trainKind', $trainKind);
        $this->set('_serialize', ['trainKind']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainKind = $this->TrainKind->newEntity();
        if ($this->request->is('post')) {
            $trainKind = $this->TrainKind->patchEntity($trainKind, $this->request->getData());
            if ($this->TrainKind->save($trainKind)) {
                $this->Flash->success(__('The train kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train kind could not be saved. Please, try again.'));
        }
        $raws = $this->TrainKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->TrainKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->TrainKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->TrainKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->TrainKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->TrainKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->TrainKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('trainKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['trainKind']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Train Kind id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainKind = $this->TrainKind->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainKind = $this->TrainKind->patchEntity($trainKind, $this->request->getData());
            if ($this->TrainKind->save($trainKind)) {
                $this->Flash->success(__('The train kind has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train kind could not be saved. Please, try again.'));
        }
        $raws = $this->TrainKind->Raws->find('list', ['limit' => 200]);
        $kinds = $this->TrainKind->Kinds->find('list', ['limit' => 200]);
        $atClassifications = $this->TrainKind->AtClassifications->find('list', ['limit' => 200]);
        $denominations = $this->TrainKind->Denominations->find('list', ['limit' => 200]);
        $mtClassifications = $this->TrainKind->MtClassifications->find('list', ['limit' => 200]);
        $classifications = $this->TrainKind->Classifications->find('list', ['limit' => 200]);
        $respondents = $this->TrainKind->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('trainKind', 'raws', 'kinds', 'atClassifications', 'denominations', 'mtClassifications', 'classifications', 'respondents'));
        $this->set('_serialize', ['trainKind']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Train Kind id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainKind = $this->TrainKind->get($id);
        if ($this->TrainKind->delete($trainKind)) {
            $this->Flash->success(__('The train kind has been deleted.'));
        } else {
            $this->Flash->error(__('The train kind could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
