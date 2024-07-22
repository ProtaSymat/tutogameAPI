<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\ContainerInterface;
use Cake\Datasource\FactoryLocator;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Http\Middleware\BodyParserMiddleware;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Http\MiddlewareQueue;
use Cake\ORM\Locator\TableLocator;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceInterface;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Identifier\IdentifierInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Cake\Routing\Router;
use Psr\Http\Message\ServerRequestInterface;
use Cake\Log\Log;

/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface
{
    /**
     * Load all the application configuration and bootstrap logic.
     *
     * @return void
     */
    public function bootstrap(): void
    {
        // Call parent to load bootstrap from files.
        parent::bootstrap();

        if (PHP_SAPI === 'cli') {
            $this->bootstrapCli();
        } else {
            FactoryLocator::add(
                'Table',
                (new TableLocator())->allowFallbackClass(false)
            );
        }

        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin('DebugKit');
        }
        

        // Load more plugins here
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware(MiddlewareQueue $middlewareQueue): MiddlewareQueue
    {
        $middlewareQueue
        // Gérer les exceptions et générer des pages d'erreur
        ->add(new ErrorHandlerMiddleware(Configure::read('Error'), $this))
        
        // Ajouter le middleware CORS immédiatement après ErrorHandlerMiddleware
        // pour s'assurer que les en-têtes CORS sont toujours envoyés, même en cas d'erreur
        ->add(new \App\Middleware\CorsMiddleware())

        // Gérer les assets statiques et le routing
        ->add(new AssetMiddleware([
            'cacheTime' => Configure::read('Asset.cacheTime'),
        ]))
        ->add(new RoutingMiddleware($this))
        
        // Parse les corps de requête encodés
        ->add(new BodyParserMiddleware())

        // Ajouter d'autres middlewares ici, comme AuthenticationMiddleware
        ->add(new AuthenticationMiddleware($this));

            $csrf = new CsrfProtectionMiddleware();

            $csrf->skipCheckCallback(function($request){
                if($request->getParam('prefix') === 'Api')
                {
                    return true;
                }
            });

            $middlewareQueue->add($csrf);

        return $middlewareQueue;
    }

    public function getAuthenticationService(ServerRequestInterface $request): AuthenticationServiceInterface
    {
        $service = new AuthenticationService();

        $fields = [
            IdentifierInterface::CREDENTIAL_USERNAME => 'email',
            IdentifierInterface::CREDENTIAL_PASSWORD => 'password'
        ];

        $service->loadIdentifier('Authentication.Password', [
            'returnPayload' => false,
            'fields' => $fields,
        ]);

        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
        ]);

        if($request->getParam('prefix') === 'Api') {
            $service->loadIdentifier('Authentication.JwtSubject');
            $service->loadAuthenticator('Authentication.Jwt', [
                'secretKey' => file_get_contents(CONFIG . '/jwt.pem'),
                'algorithm' => 'RS256',
                'returnPayload' => false
            ]);
        }else{
            $service->loadAuthenticator('Authentication.Session');
        }

    
 
        return $service;

    }

    /**
     * Register application container services.
     *
     * @param \Cake\Core\ContainerInterface $container The Container to update.
     * @return void
     * @link https://book.cakephp.org/4/en/development/dependency-injection.html#dependency-injection
     */
    public function services(ContainerInterface $container): void
    {
    }

    /**
     * Bootstrapping for CLI application.
     *
     * That is when running commands.
     *
     * @return void
     */
    protected function bootstrapCli(): void
    {
        $this->addOptionalPlugin('Bake');

        $this->addPlugin('Migrations');

        // Load more plugins here
    }
}
