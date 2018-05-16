<?php
declare(strict_types = 1);

namespace App\Infrastructure\Renderer;

/**
 * IoC Object to pass the data that needs to be rendered to the renderer
 */
interface RenderInterface
{

    /**
     * Sets multiple view vars
     *
     * @param  array $vars Variables to set
     * @return \App\Infrastructure\Renderer\RenderInterface
     */
    public function setVars(array $vars) : RenderInterface;

    /**
     * Sets a single view variable
     *
     * @param  string $name
     * @param  mixed  $value
     * @return \App\Infrastructure\Renderer\RenderInterface
     */
    public function setVar(string $name, $value) : RenderInterface;

    public function setTemplatePath(string $path) : RenderInterface;

    public function setLayout(string $layout) : RenderInterface;

    public function setLayoutPath(string $path) : RenderInterface;

}
