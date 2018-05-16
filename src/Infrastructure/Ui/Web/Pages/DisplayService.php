<?php
declare(strict_types = 1);

namespace App\Infrastructure\Ui\Web\Pages;

use App\Infrastructure\Renderer\Render;
use Psr\Container\ContainerInterface;

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

    public function __invoke()
    {
        $path = ($this->request->getParam('pass'));
        $count = count($path);

        if ($count === 0) {
            return $this->response->withStatus(404);
        }

        if ($count === 1) {
            $page = $path[0];
        } else {
            $page = $path[$count - 1];
            unset($path[$count -1 ]);
        }

        $path = 'Pages' . '/' . implode((array)$path, '/');

        return (new Render())
            ->setTemplatePath($path)
            ->setTemplate($page);
    }

}
