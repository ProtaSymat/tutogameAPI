<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Firebase\JWT\JWT;

class PricePlusController extends AppController {


    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        
        $this->Authentication->allowUnauthenticated(['login', 'viewAllCategories', 'viewCategory', 'addCategory', 'deleteCategory']);

    }

    public function login()
    {
        $result = $this->Authentication->getResult();

        if($result->isValid())
        {
            $user = $result->getData();

            $privateKey = file_get_contents(CONFIG . '/jwt.key');

            $payload = [
                'sub' => $user->id,
                'exp' => time()+60
            ];

            $user = [
                'token' => JWT::encode($payload,$privateKey,'RS256'),
                'userEnt' => $user
            ];

        }else{
            $this->response = $this->response->withStatus(401);
            $user = [
                'message' => 'invalid user'
            ];
        }

        $this->set('user',$user);
        $this->viewBuilder()->setOption('serialize', 'user');
    }

    public function logout()
    {
        $this->Authentication->logout();
    }

    public function viewAllCategories()
{
    $this->loadModel('Categories');
    $categories = $this->Categories->find()->all();
    $this->set(compact('categories'));
    $this->viewBuilder()->setOption('serialize', ['categories']);
}

    public function viewCategory($id)
    {
        $this->loadModel('Categories');
        $category = $this->Categories->get($id);
        $this->set(compact('category'));
        $this->viewBuilder()->setOption('serialize', ['category']);
    }

    public function deleteCategory($id)
    {
        $this->loadModel('Categories');
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function addCategory()
    {
        $this->loadModel('Categories');
        $this->request->allowMethod(['post']);
        $category = $this->Categories->newEntity($this->request->getData());
        if ($this->Categories->save($category)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    
    public function viewAllNews()
{
    $this->loadModel('News');
    $news = $this->News->find()->all();
    $this->set(compact('News'));
    $this->viewBuilder()->setOption('serialize', ['news']);
}

    public function viewNew($id)
    {
        $this->loadModel('News');
        $new = $this->News->get($id);
        $this->set(compact('new'));
        $this->viewBuilder()->setOption('serialize', ['new']);
    }

    public function deleteNew($id)
    {
        $this->loadModel('News');
        $this->request->allowMethod(['post', 'delete']);
        $new = $this->News->get($id);
        if ($this->News->delete($new)) {
            $message = 'Deleted';
        } else {
            $message = 'Error';
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

    public function addNew()
    {
        $this->loadModel('News');
        $this->request->allowMethod(['post']);
        $new = $this->News->newEntity($this->request->getData());
        if ($this->News->save($new)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set(compact('message'));
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}