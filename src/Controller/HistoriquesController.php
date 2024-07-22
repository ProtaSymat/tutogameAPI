<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Historiques Controller
 *
 * @property \App\Model\Table\HistoriquesTable $Historiques
 * @method \App\Model\Entity\Historique[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HistoriquesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Tutoriels'],
        ];
        $historiques = $this->paginate($this->Historiques);

        $this->set(compact('historiques'));
    }

    /**
     * View method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $historique = $this->Historiques->get($id, [
            'contain' => ['Users', 'Tutoriels'],
        ]);

        $this->set(compact('historique'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $historique = $this->Historiques->newEmptyEntity();
        if ($this->request->is('post')) {
            $historique = $this->Historiques->patchEntity($historique, $this->request->getData());
            if ($this->Historiques->save($historique)) {
                $this->Flash->success(__('The historique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historique could not be saved. Please, try again.'));
        }
        $users = $this->Historiques->Users->find('list', ['limit' => 200])->all();
        $tutoriels = $this->Historiques->Tutoriels->find('list', ['limit' => 200])->all();
        $this->set(compact('historique', 'users', 'tutoriels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $historique = $this->Historiques->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $historique = $this->Historiques->patchEntity($historique, $this->request->getData());
            if ($this->Historiques->save($historique)) {
                $this->Flash->success(__('The historique has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The historique could not be saved. Please, try again.'));
        }
        $users = $this->Historiques->Users->find('list', ['limit' => 200])->all();
        $tutoriels = $this->Historiques->Tutoriels->find('list', ['limit' => 200])->all();
        $this->set(compact('historique', 'users', 'tutoriels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Historique id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $historique = $this->Historiques->get($id);
        if ($this->Historiques->delete($historique)) {
            $this->Flash->success(__('The historique has been deleted.'));
        } else {
            $this->Flash->error(__('The historique could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllHistoriques', 'viewHistorique']);
    }
}
