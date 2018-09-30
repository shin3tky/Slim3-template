<?php
namespace Controller;

use Slim\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HelloController
{
    private $container;
    private $logger;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->logger = $this->container->get('logger');
    }

    public function version(Request $request, Response $response, array $args) : Response
    {
        $version = $this->container->get('settings')['version'];

        $this->logger->debug('version = ' . $version);

        return $response->withJson(['version' => $version]);
    }
}
