<?php
declare(strict_types = 1);

namespace App\Application\Http\Command;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * HttpCommandInterface
 */
interface HttpCommandInterface
{
    /**
     * Get the server request
     *
     * @return \Psr\Http\Message\ServerRequestInterface;
     */
    public function getRequest() : ServerRequestInterface;

    /**
     * Get the HTTP response
     *
     * @return \Psr\Http\Message\ResponseInterface;
     */
    public function getReponse() : ResponseInterface;
}
