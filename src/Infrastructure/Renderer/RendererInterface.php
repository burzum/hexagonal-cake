<?php
declare(strict_types = 1);

namespace App\Infrastructure\Renderer;

interface RendererInterface
{
    public function render(Render $render) : string;
}
