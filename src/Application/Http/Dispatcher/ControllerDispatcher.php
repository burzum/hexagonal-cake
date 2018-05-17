<?php
declare(strict_types = 1);

namespace App\Application\Http\Dispatcher;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CommandDispatcher
 */
class ControllerDispatcher implements DispatcherInterface
{
    public function getControllerClass($request)
    {
        $class = [
            $request->getParam('plugin'),
            'App',
            'Application',
            'Http',
            'Controller',
            Inflector::classify($request->getParam('prefix')),
            $request->getParam('controller'),
            Inflector::classify($request->getParam('action')) . 'Service'
        ];

        return implode(array_filter($class), '\\');
    }

    public function dispatch(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {
        $class = $this->getControllerClass($request);

        self::getContainer()->add('container', self::getContainer());
        self::getContainer()->add('request', $request);
        self::getContainer()->add('response', $response);

        if (!class_exists($class)) {
            // @todo better error handling
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
