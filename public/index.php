<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UsersController;
use Dotenv\Dotenv;
use FastRoute\RouteCollector;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$dispatcher = FastRoute\simpleDispatcher(function(RouteCollector $r) {
    $r->addRoute('GET', '/', HomeController::class . '@index');
    $r->addRoute('GET', '/users', UsersController::class . '@index');
    $r->addRoute('GET', '/users/{id:\d+}', UsersController::class . '@get');
    $r->addRoute('POST', '/users', UsersController::class . '@create');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = explode('@', $routeInfo[1]);
        $vars = array_merge($routeInfo[2], $_POST);
        $controllerName = $handler[0];
        $actionName = $handler[1];

        $controller = new $controllerName;
        $controller->$actionName($vars);
        break;
}
