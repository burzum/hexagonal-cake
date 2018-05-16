<?php
declare(strict_types = 1);

namespace App\Infrastructure\Renderer;

class Render implements RenderInterface
{
    protected $viewVars = [];
    protected $templatePath;
    protected $layoutPath;
    protected $template;
    protected $layout;

    public function setVars(array $vars) : RenderInterface
    {
        $this->viewVars = array_merge($this->viewVars, $vars);

        return $this;
    }

    public function setVar(string $name, $value) : RenderInterface
    {
        $this->viewVars[$name] = $value;

        return $this;
    }

    public function setTemplate(string $template): RenderInterface
    {
        $this->template = $template;

        return $this;
    }

    public function setLayout(string $layout): RenderInterface
    {
        $this->layout = $layout;

        return $this;
    }

    public function setTemplatePath(string $path): RenderInterface
    {
        $this->templatePath = $path;

        return $this;
    }

    public function setLayoutPath(string $path): RenderInterface
    {
        $this->CakeView->setLayoutPath($path);

        return $this;
    }

    public function getTemplate() : string
    {
        return $this->template;
    }

    public function getLayout() : string
    {
        return $this->layout;
    }

    public function getTemplatePath() : string
    {
        return $this->templatePath;
    }

    public function getLayoutPath() : string
    {
        return $this->layoutPath;
    }

    public function getViewVars() : array
    {
        return $this->viewVars;
    }
}
