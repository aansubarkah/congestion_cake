<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TrainTwitter Controller
 *
 * @property \App\Model\Table\TrainTwitterTable $TrainTwitter
 *
 * @method \App\Model\Entity\TrainTwitter[] paginate($object = null, array $settings = [])
 */
class TrainTwitterController extends AppController
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
        $query = $this->TrainTwitter->find('all', [
            'limit' => $this->limit
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
            $query->order(['t_time' => 'DESC']);
        }
        $this->paginate = ['limit' => $this->limit];

        $breadcrumbs = $this->breadcrumbs;
        $this->set('breadcrumbs', $breadcrumbs);

        $data = $this->paginate($query);
        $this->set('title', 'Twitter');
        $this->set('limit', $this->limit);
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);

    }

    /**
     * View method
     *
     * @param string|null $id Train Twitter id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trainTwitter = $this->TrainTwitter->get($id, [
            'contain' => ['Denominations', 'Classifications', 'Users', 'Raws', 'Respondents']
        ]);

        $this->set('trainTwitter', $trainTwitter);
        $this->set('_serialize', ['trainTwitter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trainTwitter = $this->TrainTwitter->newEntity();
        if ($this->request->is('post')) {
            $trainTwitter = $this->TrainTwitter->patchEntity($trainTwitter, $this->request->getData());
            if ($this->TrainTwitter->save($trainTwitter)) {
                $this->Flash->success(__('The train twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train twitter could not be saved. Please, try again.'));
        }
        $denominations = $this->TrainTwitter->Denominations->find('list', ['limit' => 200]);
        $classifications = $this->TrainTwitter->Classifications->find('list', ['limit' => 200]);
        $users = $this->TrainTwitter->Users->find('list', ['limit' => 200]);
        $raws = $this->TrainTwitter->Raws->find('list', ['limit' => 200]);
        $respondents = $this->TrainTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('trainTwitter', 'denominations', 'classifications', 'users', 'raws', 'respondents'));
        $this->set('_serialize', ['trainTwitter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Train Twitter id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trainTwitter = $this->TrainTwitter->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trainTwitter = $this->TrainTwitter->patchEntity($trainTwitter, $this->request->getData());
            if ($this->TrainTwitter->save($trainTwitter)) {
                $this->Flash->success(__('The train twitter has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The train twitter could not be saved. Please, try again.'));
        }
        $denominations = $this->TrainTwitter->Denominations->find('list', ['limit' => 200]);
        $classifications = $this->TrainTwitter->Classifications->find('list', ['limit' => 200]);
        $users = $this->TrainTwitter->Users->find('list', ['limit' => 200]);
        $raws = $this->TrainTwitter->Raws->find('list', ['limit' => 200]);
        $respondents = $this->TrainTwitter->Respondents->find('list', ['limit' => 200]);
        $this->set(compact('trainTwitter', 'denominations', 'classifications', 'users', 'raws', 'respondents'));
        $this->set('_serialize', ['trainTwitter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Train Twitter id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trainTwitter = $this->TrainTwitter->get($id);
        if ($this->TrainTwitter->delete($trainTwitter)) {
            $this->Flash->success(__('The train twitter has been deleted.'));
        } else {
            $this->Flash->error(__('The train twitter could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeRender(\Cake\Event\Event $event)
    {
        $this->viewBuilder()->theme('TwitterBootstrap');
    }
}
