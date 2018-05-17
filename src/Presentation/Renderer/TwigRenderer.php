<?php
declare(strict_types = 1);

namespace App\Presentation\Renderer;

/**
 * Twig Renderer
 */
class TwigRenderer implements RendererInterface
{

    /**
     * @var \Cake\View\View;
     */
    protected $CakeView;
    protected $viewVars = [];
    protected $request;

    /**
     * @inheritdoc
     */
    public function render(Render $render) : string
    {
        $loader = new \Twig_Loader_Filesystem($render->getTemplatePath());
        $twig = new \Twig_Environment($loader, [
            'cache' => TMP
        ]);

        $template = $twig->load($render->getTemplate());

        return $template->render($render->getViewVars());
    }
}
