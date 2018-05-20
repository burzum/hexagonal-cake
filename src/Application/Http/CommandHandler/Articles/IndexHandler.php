<?php
namespace App\Application\Http\CommandHandler\Articles;

use App\Application\Http\Application;
use App\Application\Http\Command\Articles\IndexCommand;
use App\Domain\Repository\ArticlesRepository;
use App\Presentation\Renderer\CakeRenderer;
use App\Presentation\Renderer\Render;
use Cake\Datasource\Paginator;

/**
 * Articles Index / Listing Handler
 */
class IndexHandler {

    /**
     * @param \App\Application\Http\Command\Articles\IndexCommand Command
     */
    public function handle(IndexCommand $command)
    {
        $repo = new ArticlesRepository();
        $articles = $repo->getPublicArticles();
        $paginator = new Paginator();
        $articles = $paginator->paginate(
            $articles,
            $command->getQueryParams()
        );

        $render = (new Render())
            ->setTemplatePath('Articles')
            ->setTemplate('index')
            ->setVar('articles', $articles);

        $renderer = new CakeRenderer();
        $result = $renderer->render($render);

        return Application::getContainer()->get('response')->withStringBody($result);
    }
}
