<?php
declare(strict_types = 1);

namespace App\Infrastructure\Renderer;

use Cake\View\View;

/**
 * CakePHP View Renderer
 */
class CakeRenderer implements RendererInterface
{

    /**
     * @var \Cake\View\View;
     */
    protected $CakeView;
    protected $viewVars = [];
    protected $request;

    public function render(Render $render) : string
    {
        $this->CakeView = new View();

        return $this->CakeView
            ->setTemplatePath($render->getTemplatePath())
            ->setTemplate($render->getTemplate())
            ->set($render->getViewVars())
            ->render();
    }
}
