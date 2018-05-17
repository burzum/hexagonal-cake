<?php
declare(strict_types = 1);

namespace App\Application\Http;

use App\Presentation\Renderer\CakeRenderer;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Pages Display Service
 */
class DisplayService
{

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->request = $container->get('request');
        $this->response = $container->get('response');
    }

    public function __invoke() : ResponseInterface
    {
        $view = new CakeRenderer($this->request);
        $view->setTemplatePath('Pages');

        return $this->response->withStringBody($view->render('display'));
    }

}
