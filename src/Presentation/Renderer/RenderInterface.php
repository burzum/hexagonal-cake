<?php
declare(strict_types = 1);

namespace App\Presentation\Renderer;

/**
 * IoC / Data Transfer Object to pass the data that needs to be rendered to the renderer
 */
interface RenderInterface
{
    /**
     * Sets multiple view vars
     *
     * @param  array $vars Variables to set
     * @return \App\Presentation\Renderer\RenderInterface
     */
    public function setVars(array $vars) : RenderInterface;

    /**
     * Sets a single view variable
     *
     * @param  string $name
     * @param  mixed  $value
     * @return \App\Presentation\Renderer\RenderInterface
     */
    public function setVar(string $name, $value) : RenderInterface;

    /**
     * Sets the template path
     *
     * @param string
     * @return \App\Presentation\Renderer\RenderInterface
     */
    public function setTemplatePath(string $path) : RenderInterface;

    /**
     * Sets the layout
     *
     * @param string
     * @return \App\Presentation\Renderer\RenderInterface
     */
    public function setLayout(string $layout) : RenderInterface;

    /**
     * Sets the layout path
     *
     * @param string
     * @return \App\Presentation\Renderer\RenderInterface
     */
    public function setLayoutPath(string $path) : RenderInterface;

}
