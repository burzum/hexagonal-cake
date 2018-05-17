<?php
namespace App\Application\Http\CommandHandler\Pages;

use App\Application\Http\Application;
use App\Application\Http\Command\Pages\DisplayCommand;
use App\Application\Http\CommandHandler\HttpCommandHandlerInterface;
use App\Presentation\Renderer\CakeRenderer;
use App\Presentation\Renderer\Render;

/**
 * DisplayHandler
 */
class DisplayHandler {

    /**
     *
     */
    public function handle(DisplayCommand $command) {
        $render = (new Render())
            ->setTemplatePath($command->getPath())
            ->setTemplate($command->getPage());

        $renderer = new CakeRenderer();
        $result = $renderer->render($render);

        return Application::getContainer()->get('response')->withStringBody($result);
    }
}
