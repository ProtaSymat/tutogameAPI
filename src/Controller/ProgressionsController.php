<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Progressions Controller
 *
 * @property \App\Model\Table\ProgressionsTable $Progressions
 * @method \App\Model\Entity\Progression[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgressionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Chapitres'],
        ];
        $progressions = $this->paginate($this->Progressions);

        $this->set(compact('progressions'));
    }

    /**
     * View method
     *
     * @param string|null $id Progression id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $progression = $this->Progressions->get($id, [
            'contain' => ['Users', 'Chapitres'],
        ]);

        $this->set(compact('progression'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $progression = $this->Progressions->newEmptyEntity();
        if ($this->request->is('post')) {
            $progression = $this->Progressions->patchEntity($progression, $this->request->getData());
            if ($this->Progressions->save($progression)) {
                $this->Flash->success(__('The progression has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The progression could not be saved. Please, try again.'));
        }
        $users = $this->Progressions->Users->find('list', ['limit' => 200])->all();
        $chapitres = $this->Progressions->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('progression', 'users', 'chapitres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Progression id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $progression = $this->Progressions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $progression = $this->Progressions->patchEntity($progression, $this->request->getData());
            if ($this->Progressions->save($progression)) {
                $this->Flash->success(__('The progression has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The progression could not be saved. Please, try again.'));
        }
        $users = $this->Progressions->Users->find('list', ['limit' => 200])->all();
        $chapitres = $this->Progressions->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('progression', 'users', 'chapitres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Progression id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $progression = $this->Progressions->get($id);
        if ($this->Progressions->delete($progression)) {
            $this->Flash->success(__('The progression has been deleted.'));
        } else {
            $this->Flash->error(__('The progression could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllProgressions', 'viewProgression']);
    }
}
