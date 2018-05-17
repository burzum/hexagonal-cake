<?php
declare(strict_types = 1);

namespace App\Application\Http\Dispatcher;

use App\Application\Http\Application;
use Cake\Utility\Inflector;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CommandDispatcher
 */
class CommandDispatcher implements DispatcherInterface
{
    public function getCommandClass($request)
    {
        $class = [
            $request->getParam('plugin'),
            'App',
            'Application',
            'Http',
            'Command',
            Inflector::classify($request->getParam('prefix')),
            $request->getParam('controller'),
            Inflector::classify($request->getParam('action')) . 'Command'
        ];

        return implode(array_filter($class), '\\');
    }

    public function getCommandHandlerClass($request)
    {
        $class = [
            $request->getParam('plugin'),
            'App',
            'Application',
            'Http',
            'CommandHandler',
            Inflector::classify($request->getParam('prefix')),
            $request->getParam('controller'),
            Inflector::classify($request->getParam('action')) . 'Handler'
        ];

        return implode(array_filter($class), '\\');
    }

    public function dispatch(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
    {
        Application::getContainer()->add('container', Application::getContainer());
        Application::getContainer()->add('request', $request);
        Application::getContainer()->add('response', $response);

        $commandClass = $this->getCommandClass($request);
        $handlerClass = $this->getCommandHandlerClass($request);

        if (!class_exists($commandClass)) {
            // @todo better error handling
            return $response->withStatus(404);
        }

        $handler = new $handlerClass();
        $command = new $commandClass(Application::getContainer());

        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator([
                $commandClass => $handler
            ]),
            new HandleInflector()
        );

        $commandBus = new CommandBus([
            $handlerMiddleware
        ]);

        Application::getContainer()->add('CommandBus', $commandBus);

        return $commandBus->handle($command);
    }
}
