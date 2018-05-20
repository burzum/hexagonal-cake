<?php
declare(strict_types = 1);

namespace App\Application\Http;

use App\Application\Http\Dispatcher\CommandDispatcher;
use Cake\Core\Configure;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Event\EventManagerInterface;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use League\Container\Container;
use League\Container\ReflectionContainer;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * HTTP Web Based Application
 */
class Application extends BaseApplication
{

    protected static $container;

    /**
     * Constructor
     *
     * @param string $configDir Config Directory
     * @param EventManagerInterface $eventManager Event Manager
     */
    public function __construct($configDir, EventManagerInterface $eventManager = null)
    {
        parent::__construct($configDir, $eventManager);

        static::$container = new Container();
        static::$container->delegate(new ReflectionContainer());
    }

    public static function getContainer(): ContainerInterface
    {
        return static::$container;
    }

    /**
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to set in your App Class
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware($middlewareQueue)
    {
        // Bind the error handler into the middleware queue.
        $middlewareQueue->add(
            new ErrorHandlerMiddleware(
                Configure::read('Error.exceptionRenderer')
            )
        );

        // Assets
        $middlewareQueue->add(new AssetMiddleware());

        // Routing
        $middlewareQueue->add(new RoutingMiddleware());

        return $middlewareQueue;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        return (new CommandDispatcher())->dispatch($request, $response);
    }

}
