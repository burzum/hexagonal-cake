<?php
declare(strict_types = 1);

namespace App\Application\Console;

use Cake\Http\BaseApplication;

/**
 * Console Application
 */
class Application extends BaseApplication
{
    /**
     * @param \Cake\Http\MiddlewareQueue $middleware The middleware queue to set in your App Class
     * @return \Cake\Http\MiddlewareQueue
     */
    public function middleware($middleware)
    {
        return $middleware;
    }
}
