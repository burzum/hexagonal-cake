<?php
declare(strict_types = 1);

namespace App\Application\Http\Dispatcher;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface DispatcherInterface {
    public function dispatch(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface;
}
