<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Blocs Controller
 *
 * @property \App\Model\Table\BlocsTable $Blocs
 * @method \App\Model\Entity\Bloc[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlocsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tutoriels'],
        ];
        $blocs = $this->paginate($this->Blocs);

        $this->set(compact('blocs'));
    }

    /**
     * View method
     *
     * @param string|null $id Bloc id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bloc = $this->Blocs->get($id, [
            'contain' => ['Tutoriels'],
        ]);

        $this->set(compact('bloc'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bloc = $this->Blocs->newEmptyEntity();
        if ($this->request->is('post')) {
            $bloc = $this->Blocs->patchEntity($bloc, $this->request->getData());
            if ($this->Blocs->save($bloc)) {
                $this->Flash->success(__('The bloc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bloc could not be saved. Please, try again.'));
        }
        $tutoriels = $this->Blocs->Tutoriels->find('list', ['limit' => 200])->all();
        $this->set(compact('bloc', 'tutoriels'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Bloc id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bloc = $this->Blocs->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bloc = $this->Blocs->patchEntity($bloc, $this->request->getData());
            if ($this->Blocs->save($bloc)) {
                $this->Flash->success(__('The bloc has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bloc could not be saved. Please, try again.'));
        }
        $tutoriels = $this->Blocs->Tutoriels->find('list', ['limit' => 200])->all();
        $this->set(compact('bloc', 'tutoriels'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Bloc id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bloc = $this->Blocs->get($id);
        if ($this->Blocs->delete($bloc)) {
            $this->Flash->success(__('The bloc has been deleted.'));
        } else {
            $this->Flash->error(__('The bloc could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['viewAllBlocs', 'viewBloc']);
    }
}
