<?php
namespace App\Application\Http\Controller;

use Psr\Http\Message\ResponseInterface;

interface ControllerInterface {

    public function __invoke() : ResponseInterface;
}
