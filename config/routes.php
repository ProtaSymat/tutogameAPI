<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/signup', ['controller' => 'Users', 'action' => 'signup']);
        $builder->connect('/logout', ['controller' => 'Users', 'action' => 'logout']);


        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */

    $routes->scope('/api', function (RouteBuilder $builder) {
        $builder->setExtensions(['json']);

        //Users
        $builder->post('/user/login',['controller'=> 'PricePlus', 'action'=>'login','prefix'=>'Api']);
        $builder->post('/user/logout',['controller'=> 'PricePlus', 'action'=>'logout','prefix'=>'Api']);
        $builder->get('/users', ['controller' => 'PricePlus', 'action' => 'viewAllUsers', 'prefix' => 'Api']);
        $builder->get('/user/{id}', ['controller' => 'PricePlus', 'action' => 'viewUser', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-user', ['controller' => 'PricePlus', 'action' => 'addUser', 'prefix' => 'Api']);
        $builder->put('/edit-user/{id}', ['controller' => 'PricePlus', 'action' => 'editUser', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-user/{id}', ['controller' => 'PricePlus', 'action' => 'deleteUser', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Categories
        $builder->get('/categories',['controller' => 'PricePlus', 'action' => 'viewAllCategories', 'prefix' => 'Api']);
        $builder->get('/category/{id}',['controller' => 'PricePlus', 'action' => 'viewCategory', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-category',['controller'=>'PricePlus','action'=>'addCategory','prefix'=>'Api']);
        $builder->put('/edit-category/{id}', ['controller' => 'PricePlus', 'action' => 'editCategory', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-category/{id}',['controller' => 'PricePlus', 'action' => 'deleteCategory', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Chapitres
        $builder->get('/chapitres',['controller' => 'PricePlus', 'action' => 'viewAllChapitres', 'prefix' => 'Api']);
        $builder->get('/chapitre/{id}',['controller' => 'PricePlus', 'action' => 'viewChapitre', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-chapitre',['controller'=>'PricePlus','action'=>'addChapitre','prefix'=>'Api']);
        $builder->put('/edit-chapitre/{id}',['controller' => 'PricePlus', 'action' => 'editChapitre', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-chapitre/{id}',['controller' => 'PricePlus', 'action' => 'deleteChapitre', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Articles
        $builder->get('/articles', ['controller' => 'PricePlus', 'action' => 'viewAllArticles', 'prefix' => 'Api']);
        $builder->get('/article/{id}', ['controller' => 'PricePlus', 'action' => 'viewArticle', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-article', ['controller' => 'PricePlus', 'action' => 'addArticle', 'prefix' => 'Api']);
        $builder->put('/edit-article/{id}', ['controller' => 'PricePlus', 'action' => 'editArticle', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-article/{id}', ['controller' => 'PricePlus', 'action' => 'deleteArticle', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Tutoriels
        $builder->get('/tutoriels', ['controller' => 'PricePlus', 'action' => 'viewAllTutoriels', 'prefix' => 'Api']);
        $builder->get('/tutoriel/{id}', ['controller' => 'PricePlus', 'action' => 'viewTutoriel', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-tutoriel', ['controller' => 'PricePlus', 'action' => 'addTutoriel', 'prefix' => 'Api']);
        $builder->put('/edit-tutoriel/{id}', ['controller' => 'PricePlus', 'action' => 'editTutoriel', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-tutoriel/{id}', ['controller' => 'PricePlus', 'action' => 'deleteTutoriel', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        
        //Blocs
        $builder->get('/blocs', ['controller' => 'PricePlus', 'action' => 'viewAllBlocs', 'prefix' => 'Api']);
        $builder->get('/bloc/{id}', ['controller' => 'PricePlus', 'action' => 'viewBloc', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-bloc', ['controller' => 'PricePlus', 'action' => 'addBloc', 'prefix' => 'Api']);
        $builder->put('/edit-bloc/{id}', ['controller' => 'PricePlus', 'action' => 'editBloc', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-bloc/{id}', ['controller' => 'PricePlus', 'action' => 'deleteBloc', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
                
        //Quizs
        $builder->get('/quizs', ['controller' => 'PricePlus', 'action' => 'viewAllQuizs', 'prefix' => 'Api']);
        $builder->get('/quiz/{id}', ['controller' => 'PricePlus', 'action' => 'viewQuiz', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-quiz', ['controller' => 'PricePlus', 'action' => 'addQuiz', 'prefix' => 'Api']);
        $builder->put('/edit-quiz/{id}', ['controller' => 'PricePlus', 'action' => 'editQuiz', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-quiz/{id}', ['controller' => 'PricePlus', 'action' => 'deleteQuiz', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Questions
        $builder->get('/questions', ['controller' => 'PricePlus', 'action' => 'viewAllQuestions', 'prefix' => 'Api']);
        $builder->get('/question/{id}', ['controller' => 'PricePlus', 'action' => 'viewQuestion', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-question', ['controller' => 'PricePlus', 'action' => 'addQuestion', 'prefix' => 'Api']);
        $builder->put('/edit-question/{id}', ['controller' => 'PricePlus', 'action' => 'editQuestion', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-question/{id}', ['controller' => 'PricePlus', 'action' => 'deleteQuestion', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Reponses
        $builder->get('/reponses', ['controller' => 'PricePlus', 'action' => 'viewAllReponses', 'prefix' => 'Api']);
        $builder->get('/reponse/{id}', ['controller' => 'PricePlus', 'action' => 'viewReponse', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-reponse', ['controller' => 'PricePlus', 'action' => 'addReponse', 'prefix' => 'Api']);
        $builder->put('/edit-reponse/{id}', ['controller' => 'PricePlus', 'action' => 'editReponse', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-reponse/{id}', ['controller' => 'PricePlus', 'action' => 'deleteReponse', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        
        //Progressions
        $builder->get('/progressions', ['controller' => 'PricePlus', 'action' => 'viewAllProgressions', 'prefix' => 'Api']);
        $builder->get('/progression/{id}', ['controller' => 'PricePlus', 'action' => 'viewProgression', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-progression', ['controller' => 'PricePlus', 'action' => 'addProgression', 'prefix' => 'Api']);
        $builder->put('/edit-progression/{id}', ['controller' => 'PricePlus', 'action' => 'editProgression', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-progression/{id}', ['controller' => 'PricePlus', 'action' => 'deleteProgression', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);

        //Historiques
        $builder->get('/historiques', ['controller' => 'PricePlus', 'action' => 'viewAllHistoriques', 'prefix' => 'Api']);
        $builder->get('/historique/{id}', ['controller' => 'PricePlus', 'action' => 'viewHistorique', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->post('/add-historique', ['controller' => 'PricePlus', 'action' => 'addHistorique', 'prefix' => 'Api']);
        $builder->put('/edit-historique/{id}', ['controller' => 'PricePlus', 'action' => 'editHistorique', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
        $builder->delete('/delete-historique/{id}', ['controller' => 'PricePlus', 'action' => 'deleteHistorique', 'prefix' => 'Api'])->setPatterns(['id' => '\d+'])->setPass(['id']);
    });
};
