<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$env = isset($_SERVER['APP_ENV']) ? $_SERVER['APP_ENV'] : 'local';

$app = new \Slim\App($configs[$env]);

$container = $app->getContainer();

// 404 Not Found
$container['notFoundHandler'] = function ($c) {
    return function (Request $request, Response $response) use ($c) : Response {
        return $c['response']
            ->withJson(['code' => 404, 'message' => 'Not Found'], 404);
    };
};

// 405 Not Allowed
$container['notAllowedHandler'] = function ($c) {
    return function (Request $request, Response $response, array $methods) use ($c) : Response {
        $c->get('logger')->error('ERROR(405): requested method was not in ' . implode(', ', $methods));

        return $c['response']
        ->withJson(['code' => 405, 'message' => 'Not Allowed'], 405);
    };
};

// 500 Internal Server Error
$container['errorHandler'] = function ($c) {
    return function (Request $request, Response $response, \Exception $exception) use ($c) : Response {
        $c->get('logger')->error('ERROR(500): ' . $exception->getMessage());

        return $c['response']
            ->withJson(['code' => 500, 'message' => 'Internal Server Error'], 500);
    };
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $handler = new Monolog\Handler\StreamHandler($settings['path'], $settings['level']);
    $handler->setFormatter(new Monolog\Formatter\JsonFormatter());
    $logger->pushHandler($handler);

    return $logger;
};

// idiorm
ORM::configure($container->get('settings')['database']);
