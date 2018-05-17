<?php
declare(strict_types = 1);

namespace App\Application\Http\Command;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * AbstractCommand
 */
abstract class AbstractCommand implements HttpCommandInterface
{
    /**
     * ContainerInterface
     */
    protected $container;

    /**
     * Constructor
     *
     * @param \Psr\Container\ContainerInterface DI Container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->initialize();
    }

    /**
     * @return \Psr\Http\Message\ServerRequestInterface;
     */
    public function getRequest() : ServerRequestInterface
    {
        return $this->container->get('request');
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface;
     */
    public function getReponse() : ResponseInterface
    {
        return $this->container->get('response');
    }

    /**
     * Initialize class properties here instead of in the constructor
     *
     * This method is called by the constructor
     *
     * @return void
     */
    protected function initialize() : void
    {

    }
}
