<?php
declare(strict_types = 1);

namespace App\Infrastructure\Ui\Web;

use Cake\View\View;
use Psr\Http\Message\ServerRequestInterface;

/**
 * CakePHP View Renderer
 */
class CakeView implements ViewInterface
{

    /**
     * @var \Cake\View\View;
     */
    protected $CakeView;
    protected $viewVars = [];
    protected $request;

    public function __construct(ServerRequestInterface $request)
    {
        $this->request = $request;

        $this->CakeView = new View($request);
    }

    public function setVars(array $vars) : ViewInterface
    {
        $this->viewVars = array_merge($this->viewVars, $vars);

        return $this;
    }

    public function setVar(string $name, $value) : ViewInterface
    {
        $this->viewVars[$name] = $value;

        return $this;
    }

    public function setLayout(string $layout): ViewInterface
    {
        return $this;
    }

    public function render(string $template) : string
    {
        return $this->CakeView
            ->set($this->viewVars)
            ->render($template);
    }

    public function setTemplatePath(string $path): ViewInterface
    {
        $this->CakeView->setTemplatePath($path);

        return $this;
    }

    public function setLayoutPath(string $path): ViewInterface
    {
        $this->CakeView->setLayoutPath($path);

        return $this;
    }
}
