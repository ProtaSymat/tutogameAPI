<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Quizs Controller
 *
 * @property \App\Model\Table\QuizsTable $Quizs
 * @method \App\Model\Entity\Quiz[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizsController extends AppController
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
        $quizs = $this->paginate($this->Quizs);

        $this->set(compact('quizs'));
    }

    /**
     * View method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quiz = $this->Quizs->get($id, [
            'contain' => ['Chapitres'],
        ]);

        $this->set(compact('quiz'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quiz = $this->Quizs->newEmptyEntity();
        if ($this->request->is('post')) {
            $quiz = $this->Quizs->patchEntity($quiz, $this->request->getData());
            if ($this->Quizs->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $chapitres = $this->Quizs->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('quiz', 'chapitres'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quiz = $this->Quizs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quiz = $this->Quizs->patchEntity($quiz, $this->request->getData());
            if ($this->Quizs->save($quiz)) {
                $this->Flash->success(__('The quiz has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The quiz could not be saved. Please, try again.'));
        }
        $chapitres = $this->Quizs->Chapitres->find('list', ['limit' => 200])->all();
        $this->set(compact('quiz', 'chapitres'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Quiz id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quiz = $this->Quizs->get($id);
        if ($this->Quizs->delete($quiz)) {
            $this->Flash->success(__('The quiz has been deleted.'));
        } else {
            $this->Flash->error(__('The quiz could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllQuizs', 'viewQuiz']);
    }
}
