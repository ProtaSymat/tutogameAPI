<?php

namespace App\Controller\Api;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Firebase\JWT\JWT;
use Cake\Log\Log;

class PricePlusController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated([
            "login",
            "logout",
            "viewAllUsers",
            "viewUser",
            "addUser",
            "editUser",
            "deleteUser",
            "viewAllCategories",
            "viewCategory",
            "addCategory",
            "editCategory",
            "deleteCategory",
            "viewAllChapitres",
            "viewChapitre",
            "addChapitre",
            "deleteChapitre",
            "editChapitre",
            "viewAllArticles",
            "viewArticle",
            "addArticle",
            "editArticle",
            "deleteArticle",
            "viewAllTutoriels",
            "viewTutoriel",
            "addTutoriel",
            "editTutoriel",
            "deleteTutoriel",
            "viewAllBlocs",
            "viewBloc",
            "addBloc",
            "editBloc",
            "deleteBloc",
            "viewAllQuizs",
            "viewQuiz",
            "addQuiz",
            "editQuiz",
            "deleteQuiz",
            "viewAllQuestions",
            "viewQuestion",
            "addQuestion",
            "editQuestion",
            "deleteQuestion",
            "viewAllReponses",
            "viewReponse",
            "addReponse",
            "editReponse",
            "deleteReponse",
            "viewAllProgressions",
            "viewProgression",
            "addProgression",
            "editProgression",
            "deleteProgression",
            "viewAllHistoriques",
            "viewHistorique",
            "addHistorique",
            "editHistorique",
            "deleteHistorique",
        ]);
    }

    public function login()
    {
        $result = $this->Authentication->getResult();

        if ($result->isValid()) {
            $user = $result->getData();

            $privateKey = file_get_contents(CONFIG . "/jwt.key");

            $payload = [
                "sub" => $user->id,
                "exp" => time() + 60,
            ];

            $user = [
                "token" => JWT::encode($payload, $privateKey, "RS256"),
                "userEnt" => $user,
            ];
        } else {
            $this->response = $this->response->withStatus(401);
            $user = [
                "message" => "invalid user",
            ];
        }

        $this->set("user", $user);
        $this->viewBuilder()->setOption("serialize", "user");
    }

    public function logout()
    {
        $this->Authentication->logout();
    }

    public function viewAllUsers()
    {
        $this->loadModel("Users");
        $users = $this->Users->find()->all();
        $this->set(compact("users"));
        $this->viewBuilder()->setOption("serialize", ["users"]);
    }

    public function viewUser($id)
    {
        $this->loadModel("Users");
        $user = $this->Users->get($id);
        $this->set(compact("user"));
        $this->viewBuilder()->setOption("serialize", ["user"]);
    }

    public function addUser()
    {
        $this->loadModel("Users");
        $this->request->allowMethod(["post"]);
        $user = $this->Users->newEntity($this->request->getData());
        if ($this->Users->save($user)) {
            $message = "Saved";
        } else {
            $message = "Error";
            $errors = $user->getErrors();
            $this->set(compact("errors"));
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }
    public function editUser($id)
    {
        $this->loadModel("Users");
        $this->request->allowMethod(["patch", "post", "put"]);
        $user = $this->Users->get($id);

        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
            $message = "Updated";
        } else {
            $message = "Error";
        }

        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function deleteUser($id)
    {
        $this->loadModel("Users");
        $this->request->allowMethod(["post", "delete"]);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllCategories()
    {
        $this->loadModel("Categories");
        $categories = $this->Categories->find()->all();
        $this->set(compact("categories"));
        $this->viewBuilder()->setOption("serialize", ["categories"]);
    }

    public function viewCategory($id)
    {
        $this->loadModel("Categories");
        $category = $this->Categories->get($id);
        $this->set(compact("category"));
        $this->viewBuilder()->setOption("serialize", ["category"]);
    }

    public function deleteCategory($id)
    {
        $this->loadModel("Categories");
        $this->request->allowMethod(["post", "delete"]);
        $category = $this->Categories->get($id);
        if ($this->Categories->delete($category)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }
    public function editCategory($id)
    {
        $this->loadModel("Categories");
        $this->request->allowMethod(["patch", "post", "put"]);
        $category = $this->Categories->get($id);

        $category = $this->Categories->patchEntity(
            $category,
            $this->request->getData()
        );
        if ($this->Categories->save($category)) {
            $message = "Updated";
        } else {
            $message = "Error";
        }

        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }
    public function addCategory()
    {
        $this->loadModel("Categories");
        $this->request->allowMethod(["post"]);
        $category = $this->Categories->newEntity($this->request->getData());
        if ($this->Categories->save($category)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllChapitres()
    {
        $this->loadModel("Chapitres");
        $chapitres = $this->Chapitres->find()->all();
        $this->set(compact("chapitres"));
        $this->viewBuilder()->setOption("serialize", ["chapitres"]);
    }

    public function viewChapitre($id)
    {
        $this->loadModel("Chapitres");
        $chapitre = $this->Chapitres->get($id);
        $this->set(compact("chapitre"));
        $this->viewBuilder()->setOption("serialize", ["chapitre"]);
    }

    public function deleteChapitre($id)
    {
        $this->loadModel("Chapitres");
        $this->request->allowMethod(["post", "delete"]);
        $chapitre = $this->Chapitres->get($id);
        if ($this->Chapitres->delete($chapitre)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function addChapitre()
    {
        $this->loadModel("Chapitres");
        $this->request->allowMethod(["post"]);
        $chapitre = $this->Chapitres->newEntity($this->request->getData());
        if ($this->Chapitres->save($chapitre)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }
    public function editChapitre($id)
    {
        $this->loadModel("Chapitres");
        $this->request->allowMethod(["patch", "post", "put"]);
        $chapitre = $this->Chapitres->get($id);

        $chapitre = $this->Chapitres->patchEntity(
            $chapitre,
            $this->request->getData()
        );
        if ($this->Chapitres->save($chapitre)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $chapitre->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }

        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllArticles()
    {
        $this->loadModel("Articles");
        $articles = $this->Articles->find()->all();
        $this->set(compact("articles"));
        $this->viewBuilder()->setOption("serialize", ["articles"]);
    }

    public function viewArticle($id)
    {
        $this->loadModel("Articles");
        $article = $this->Articles->get($id);
        $this->set(compact("article"));
        $this->viewBuilder()->setOption("serialize", ["article"]);
    }

    public function addArticle()
    {
        $this->loadModel("Articles");
        $this->request->allowMethod(["post"]);
        $article = $this->Articles->newEntity($this->request->getData());
        if ($this->Articles->save($article)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editArticle($id)
    {
        $this->loadModel("Articles");
        $this->request->allowMethod(["patch", "post", "put"]);
        $article = $this->Articles->get($id);

        $article = $this->Articles->patchEntity(
            $article,
            $this->request->getData()
        );
        if ($this->Articles->save($article)) {
            $message = "Updated";
        } else {
            $message = "Error";
        }

        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function deleteArticle($id)
    {
        $this->loadModel("Articles");
        $this->request->allowMethod(["post", "delete"]);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllTutoriels()
    {
        $this->loadModel("Tutoriels");
        $tutoriels = $this->Tutoriels->find()->all();
        $this->set(compact("tutoriels"));
        $this->viewBuilder()->setOption("serialize", ["tutoriels"]);
    }

    public function viewTutoriel($id)
    {
        $this->loadModel("Tutoriels");
        $tutoriel = $this->Tutoriels->get($id);
        $this->set(compact("tutoriel"));
        $this->viewBuilder()->setOption("serialize", ["tutoriel"]);
    }

    public function addTutoriel()
    {
        $this->loadModel("Tutoriels");
        $this->request->allowMethod(["post"]);
        $tutoriel = $this->Tutoriels->newEntity($this->request->getData());
        if ($this->Tutoriels->save($tutoriel)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }


    public function editTutoriel($id)
    {
        $this->loadModel("Tutoriels");
        $this->request->allowMethod(["patch", "post", "put"]);
        $tutoriel = $this->Tutoriels->get($id);

        $tutoriel = $this->Tutoriels->patchEntity(
            $tutoriel,
            $this->request->getData()
        );
        if ($this->Tutoriels->save($tutoriel)) {
            $message = "Updated";
} else {
            $message = "Error";
            $errors = $tutoriel->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }

        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function deleteTutoriel($id)
    {
        $this->loadModel("Tutoriels");
        $this->request->allowMethod(["post", "delete"]);
        $article = $this->Tutoriels->get($id);
        if ($this->Tutoriels->delete($article)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllBlocs()
    {
        $this->loadModel("Blocs");
        $blocs = $this->Blocs->find()->all();
        $this->set(compact("blocs"));
        $this->viewBuilder()->setOption("serialize", ["blocs"]);
    }

    public function viewBloc($id)
    {
        $this->loadModel("Blocs");
        $bloc = $this->Blocs->get($id);
        $this->set(compact("bloc"));
        $this->viewBuilder()->setOption("serialize", ["bloc"]);
    }

    public function addBloc()
    {
        $this->loadModel("Blocs");
        $this->request->allowMethod(["post"]);
        $bloc = $this->Blocs->newEntity($this->request->getData());
        if ($this->Blocs->save($bloc)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editBloc($id)
    {
        $this->loadModel("Blocs");
        $this->request->allowMethod(["patch", "post", "put"]);
        $bloc = $this->Blocs->get($id);
        $bloc = $this->Blocs->patchEntity($bloc, $this->request->getData());
        if ($this->Blocs->save($bloc)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $bloc->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteBloc($id)
    {
        $this->loadModel("Blocs");
        $this->request->allowMethod(["post", "delete"]);
        $bloc = $this->Blocs->get($id);
        if ($this->Blocs->delete($bloc)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllQuizs()
    {
        $this->loadModel("Quizs");
        $quizs = $this->Quizs->find()->all();
        $this->set(compact("quizs"));
        $this->viewBuilder()->setOption("serialize", ["quizs"]);
    }

    public function viewQuiz($id)
    {
        $this->loadModel("Quizs");
        $quiz = $this->Quizs->get($id);
        $this->set(compact("quiz"));
        $this->viewBuilder()->setOption("serialize", ["quiz"]);
    }

    public function addQuiz()
    {
        $this->loadModel("Quizs");
        $this->request->allowMethod(["post"]);
        $quiz = $this->Quizs->newEntity($this->request->getData());
        if ($this->Quizs->save($quiz)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editQuiz($id)
    {
        $this->loadModel("Quizs");
        $this->request->allowMethod(["patch", "post", "put"]);
        $quiz = $this->Quizs->get($id);
        $quiz = $this->Quizs->patchEntity($quiz, $this->request->getData());
        if ($this->Quizs->save($quiz)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $quiz->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteQuiz($id)
    {
        $this->loadModel("Quizs");
        $this->request->allowMethod(["post", "delete"]);
        $quiz = $this->Quizs->get($id);
        if ($this->Quizs->delete($quiz)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    
    public function viewAllQuestions()
    {
        $this->loadModel("Questions");
        $questions = $this->Questions->find()->all();
        $this->set(compact("questions"));
        $this->viewBuilder()->setOption("serialize", ["questions"]);
    }

    public function viewQuestion($id)
    {
        $this->loadModel("Questions");
        $question = $this->Questions->get($id);
        $this->set(compact("question"));
        $this->viewBuilder()->setOption("serialize", ["question"]);
    }

    public function addQuestion()
    {
        $this->loadModel("Questions");
        $this->request->allowMethod(["post"]);
        $question = $this->Questions->newEntity($this->request->getData());
        if ($this->Questions->save($question)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editQuestion($id)
    {
        $this->loadModel("Questions");
        $this->request->allowMethod(["patch", "post", "put"]);
        $question = $this->Questions->get($id);
        $question = $this->Questions->patchEntity($question, $this->request->getData());
        if ($this->Questions->save($question)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $question->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteQuestion($id)
    {
        $this->loadModel("Questions");
        $this->request->allowMethod(["post", "delete"]);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

        
    public function viewAllReponses()
    {
        $this->loadModel("Reponses");
        $reponses = $this->Reponses->find()->all();
        $this->set(compact("reponses"));
        $this->viewBuilder()->setOption("serialize", ["reponses"]);
    }

    public function viewReponse($id)
    {
        $this->loadModel("Reponses");
        $reponse = $this->Reponses->get($id);
        $this->set(compact("reponse"));
        $this->viewBuilder()->setOption("serialize", ["reponse"]);
    }

    public function addReponse()
    {
        $this->loadModel("Reponses");
        $this->request->allowMethod(["post"]);
        $reponse = $this->Reponses->newEntity($this->request->getData());
        if ($this->Reponses->save($reponse)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editReponse($id)
    {
        $this->loadModel("Reponses");
        $this->request->allowMethod(["patch", "post", "put"]);
        $reponse = $this->Reponses->get($id);
        $reponse = $this->Reponses->patchEntity($reponse, $this->request->getData());
        if ($this->Reponses->save($reponse)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $reponse->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteReponse($id)
    {
        $this->loadModel("Reponses");
        $this->request->allowMethod(["post", "delete"]);
        $reponse = $this->Reponses->get($id);
        if ($this->Reponses->delete($reponse)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    
    public function viewAllProgressions()
    {
        $this->loadModel("Progressions");
        $progressions = $this->Progressions->find()->all();
        $this->set(compact("progressions"));
        $this->viewBuilder()->setOption("serialize", ["progressions"]);
    }

    public function viewProgression($id)
    {
        $this->loadModel("Progressions");
        $progression = $this->Progressions->get($id);
        $this->set(compact("progression"));
        $this->viewBuilder()->setOption("serialize", ["progression"]);
    }

    public function addProgression()
    {
        $this->loadModel("Progressions");
        $this->request->allowMethod(["post"]);
        $progression = $this->Progressions->newEntity($this->request->getData());
        if ($this->Progressions->save($progression)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editProgression($id)
    {
        $this->loadModel("Progressions");
        $this->request->allowMethod(["patch", "post", "put"]);
        $progression = $this->Progressions->get($id);
        $progression = $this->Progressions->patchEntity($progression, $this->request->getData());
        if ($this->Progressions->save($progression)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $progression->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteProgression($id)
    {
        $this->loadModel("Progressions");
        $this->request->allowMethod(["post", "delete"]);
        $progression = $this->Progressions->get($id);
        if ($this->Progressions->delete($progression)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function viewAllHistoriques()
    {
        $this->loadModel("Historiques");
        $historiques = $this->Historiques->find()->all();
        $this->set(compact("historiques"));
        $this->viewBuilder()->setOption("serialize", ["historiques"]);
    }

    public function viewHistorique($id)
    {
        $this->loadModel("Historiques");
        $historique = $this->Historiques->get($id);
        $this->set(compact("historique"));
        $this->viewBuilder()->setOption("serialize", ["historique"]);
    }

    public function addHistorique()
    {
        $this->loadModel("Historiques");
        $this->request->allowMethod(["post"]);
        $historique = $this->Historiques->newEntity($this->request->getData());
        if ($this->Historiques->save($historique)) {
            $message = "Saved";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }

    public function editHistorique($id)
    {
        $this->loadModel("Historiques");
        $this->request->allowMethod(["patch", "post", "put"]);
        $historique = $this->Historiques->get($id);
        $historique = $this->Historiques->patchEntity($historique, $this->request->getData());
        if ($this->Historiques->save($historique)) {
            $message = "Updated";
        } else {
            $message = "Error";
            $errors = $historique->getErrors();
            $this->set(compact("message", "errors"));
            $this->viewBuilder()->setOption("serialize", ["message", "errors"]);
        }
    }

    public function deleteHistorique($id)
    {
        $this->loadModel("Historiques");
        $this->request->allowMethod(["post", "delete"]);
        $historique = $this->Historiques->get($id);
        if ($this->Historiques->delete($historique)) {
            $message = "Deleted";
        } else {
            $message = "Error";
        }
        $this->set(compact("message"));
        $this->viewBuilder()->setOption("serialize", ["message"]);
    }
}
