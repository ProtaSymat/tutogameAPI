<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Tutoriels Controller
 *
 * @property \App\Model\Table\TutorielsTable $Tutoriels
 * @method \App\Model\Entity\Tutoriel[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TutorielsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Chapitres'],
        ];
        $tutoriels = $this->paginate($this->Tutoriels);

        $this->set(compact('tutoriels'));
    }

    /**
     * View method
     *
     * @param string|null $id Tutoriel id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tutoriel = $this->Tutoriels->get($id, [
            'contain' => ['Chapitres'],
        ]);

        $this->set(compact('tutoriel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tutoriel = $this->Tutoriels->newEmptyEntity();
        if ($this->request->is('post')) {
            $tutoriel = $this->Tutoriels->patchEntity($tutoriel, $this->request->getData());
            if ($this->Tutoriels->save($tutoriel)) {
                $this->Flash->success(__('The tutoriel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tutoriel could not be saved. Please, try again.'));
        }
        $chapitres = $this->Tutoriels->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('tutoriel', 'chapitres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tutoriel id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tutoriel = $this->Tutoriels->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tutoriel = $this->Tutoriels->patchEntity($tutoriel, $this->request->getData());
            if ($this->Tutoriels->save($tutoriel)) {
                $this->Flash->success(__('The tutoriel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tutoriel could not be saved. Please, try again.'));
        }
        $chapitres = $this->Tutoriels->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('tutoriel', 'chapitres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tutoriel id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tutoriel = $this->Tutoriels->get($id);
        if ($this->Tutoriels->delete($tutoriel)) {
            $this->Flash->success(__('The tutoriel has been deleted.'));
        } else {
            $this->Flash->error(__('The tutoriel could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllTutoriels', 'viewTutoriel']);
    }
}
