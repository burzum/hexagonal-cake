<?php
namespace App\Application\Http\CommandHandler\Articles;

use App\Application\Http\Application;
use App\Application\Http\Command\Articles\IndexCommand;
use App\Domain\Repository\ArticlesRepository;
use App\Presentation\Renderer\CakeRenderer;
use App\Presentation\Renderer\Render;

/**
 * Articles Index / Listing Handler
 */
class IndexHandler {

    /**
     *
     */
    public function handle(IndexCommand $command)
    {
        $repo = new ArticlesRepository();

        $render = (new Render())
            ->setTemplatePath('Articles')
            ->setTemplate('index')
            ->setVar('articles', $repo->paginatePublicArticles($command->getQueryParams()));

        $renderer = new CakeRenderer();
        $result = $renderer->render($render);

        return Application::getContainer()->get('response')->withStringBody($result);
    }
}
