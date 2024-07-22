<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reponses Controller
 *
 * @property \App\Model\Table\ReponsesTable $Reponses
 * @method \App\Model\Entity\Reponse[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReponsesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions', 'Users'],
        ];
        $reponses = $this->paginate($this->Reponses);

        $this->set(compact('reponses'));
    }

    /**
     * View method
     *
     * @param string|null $id Reponse id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reponse = $this->Reponses->get($id, [
            'contain' => ['Questions', 'Users'],
        ]);

        $this->set(compact('reponse'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reponse = $this->Reponses->newEmptyEntity();
        if ($this->request->is('post')) {
            $reponse = $this->Reponses->patchEntity($reponse, $this->request->getData());
            if ($this->Reponses->save($reponse)) {
                $this->Flash->success(__('The reponse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reponse could not be saved. Please, try again.'));
        }
        $questions = $this->Reponses->Questions->find('list', ['limit' => 200])->all();
        $users = $this->Reponses->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('reponse', 'questions', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reponse id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reponse = $this->Reponses->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reponse = $this->Reponses->patchEntity($reponse, $this->request->getData());
            if ($this->Reponses->save($reponse)) {
                $this->Flash->success(__('The reponse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reponse could not be saved. Please, try again.'));
        }
        $questions = $this->Reponses->Questions->find('list', ['limit' => 200])->all();
        $users = $this->Reponses->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('reponse', 'questions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reponse id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reponse = $this->Reponses->get($id);
        if ($this->Reponses->delete($reponse)) {
            $this->Flash->success(__('The reponse has been deleted.'));
        } else {
            $this->Flash->error(__('The reponse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
