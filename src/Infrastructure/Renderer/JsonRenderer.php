<?php
declare(strict_types = 1);

namespace App\Infrastructure\Renderer;

/**
 * CakePHP View Renderer
 */
class JsonRenderer implements RendererInterface
{
    public function render(Render $render): string {
        return json_encode($render->getViewVars());
    }
}
