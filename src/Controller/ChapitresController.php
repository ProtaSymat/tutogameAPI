<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Chapitres Controller
 *
 * @property \App\Model\Table\ChapitresTable $Chapitres
 * @method \App\Model\Entity\Chapitre[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ChapitresController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categories'],
        ];
        $chapitres = $this->paginate($this->Chapitres);

        $this->set(compact('chapitres'));
    }

    /**
     * View method
     *
     * @param string|null $id Chapitre id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chapitre = $this->Chapitres->get($id, [
            'contain' => ['Categories'],
        ]);

        $this->set(compact('chapitre'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chapitre = $this->Chapitres->newEmptyEntity();
        if ($this->request->is('post')) {
            $chapitre = $this->Chapitres->patchEntity($chapitre, $this->request->getData());
            if ($this->Chapitres->save($chapitre)) {
                $this->Flash->success(__('The chapitre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapitre could not be saved. Please, try again.'));
        }
        $categories = $this->Chapitres->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('chapitre', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Chapitre id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chapitre = $this->Chapitres->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chapitre = $this->Chapitres->patchEntity($chapitre, $this->request->getData());
            if ($this->Chapitres->save($chapitre)) {
                $this->Flash->success(__('The chapitre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chapitre could not be saved. Please, try again.'));
        }
        $categories = $this->Chapitres->Categories->find('list', ['limit' => 200])->all();
        $this->set(compact('chapitre', 'categories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Chapitre id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chapitre = $this->Chapitres->get($id);
        if ($this->Chapitres->delete($chapitre)) {
            $this->Flash->success(__('The chapitre has been deleted.'));
        } else {
            $this->Flash->error(__('The chapitre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllChapitres', 'viewChapitre']);
    }
}
