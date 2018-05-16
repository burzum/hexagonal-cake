<?php
declare(strict_types=1);

namespace App\Infrastructure\Ui\Web;

use App\Infrastructure\Renderer\CakeRenderer;
use App\Infrastructure\Renderer\JsonRenderer;
use App\Infrastructure\Renderer\Render;
use Cake\Core\Configure;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Event\EventManagerInterface;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Cake\Utility\Inflector;
use League\Container\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Application
 */
class Application extends BaseApplication
{

    protected static $container;

    public function __construct($configDir, EventManagerInterface $eventManager = null)
    {
        parent::__construct($configDir, $eventManager);

        static::$container = new Container();
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
        $class = [
            $request->getParam('plugin'),
            'App',
            'Infrastructure',
            'Ui',
            'Web',
            $request->getParam('prefix'),
            $request->getParam('controller'),
            Inflector::classify($request->getParam('action')) . 'Service'
        ];

        $class = implode(array_filter($class), '\\');

        self::getContainer()->add('container', self::getContainer());
        self::getContainer()->add('request', $request);
        self::getContainer()->add('response', $response);

        if (!class_exists($class)) {
            return $response->withStatus(404);
        }

        self::getContainer()
            ->add($class)
            ->withArgument('container');

        $service = self::getContainer()->get($class);

        $result = $service();

        if ($result instanceof ResponseInterface) {
            return $response;
        }

        if ($result instanceof Render) {
            $renderer = new CakeRenderer();

            return $response->withStringBody($renderer->render($result));
        }

        return $response;
    }

}
