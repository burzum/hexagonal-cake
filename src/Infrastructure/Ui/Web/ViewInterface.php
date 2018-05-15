<?php
declare(strict_types = 1);

namespace App\Infrastructure\Ui\Web;

interface ViewInterface
{

    /**
     * Sets multiple view vars
     *
     * @param  array $vars Variables to set
     * @return \App\Infrastructure\Ui\Web\ViewInterface
     */
    public function setVars(array $vars) : ViewInterface;

    /**
     * Sets a single view variable
     *
     * @param  string $name
     * @param  mixed  $value
     * @return \App\Infrastructure\Ui\Web\ViewInterface
     */
    public function setVar(string $name, $value) : ViewInterface;

    public function setTemplatePath(string $path) : ViewInterface;

    public function setLayout(string $layout) : ViewInterface;

    public function setLayoutPath(string $path) : ViewInterface;

    public function render(string $template) : string;

}
