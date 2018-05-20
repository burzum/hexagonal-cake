<?php
namespace App\Application\Http\Controller;

/**
 * AbstractController
 */
abstract class AbstractController {

    protected $container;
    protected $request;
    protected $response;

    public function __construct(ServerRequestInterface $request, Response $response, ContainerInterface $container)
    {
        $this->container = $container;
        $this->request = $request;
        $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getRequest()
    {
        return $this->request;
    }
}
