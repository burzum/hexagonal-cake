<?php
declare(strict_types = 1);

namespace App\Infrastructure\Ui\Web\Pages;

use App\Application\Http\Controller\AbstractController;
use App\Infrastructure\Persistence\Database\Table\UsersTable;
use App\Presentation\Renderer\Render;
use Cake\Http\Response;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Pages Display Service
 */
class DisplayController extends AbstractController
{
    public function __invoke()
    {

        $table = new UsersTable();
        $table->find('first');

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
