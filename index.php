<?php

require_once "vendor/autoload.php";


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/registration', ['App\controller\HomeController','registration']);
    $r->addRoute('POST', '/registerService', ['App\controller\HomeController','registerService']);
    $r->addRoute('GET', '/login', ['App\controller\HomeController','login']);
    $r->addRoute('POST', '/loginService', ['App\controller\HomeController','singIn']);
    $r->addRoute('GET', '/users', ['App\controller\HomeController','users']);
    $r->addRoute('GET', '/logout', ['App\controller\HomeController','logout']);
    $r->addRoute('GET', '/create', ['App\controller\HomeController','create']);
    $r->addRoute('POST', '/createService', ['App\controller\HomeController','createService']);
    $r->addRoute('GET', '/edit/{id:\d+}', ['App\controller\HomeController','edit']);
    $r->addRoute('POST', '/editService', ['App\controller\HomeController','editService']);
    $r->addRoute('GET', '/security/{id:\d+}', ['App\controller\HomeController','security']);
    $r->addRoute('POST', '/securityService', ['App\controller\HomeController','securityService']);
    $r->addRoute('GET', '/delete/{id:\d+}', ['App\controller\HomeController','delete']);
    $r->addRoute('GET', '/profile/{id:\d+}', ['App\controller\HomeController','profile']);
    $r->addRoute('GET', '/status/{id:\d+}', ['App\controller\HomeController','status']);
    $r->addRoute('POST', '/statusService', ['App\controller\HomeController','statusService']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

//var_dump($uri);

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);
//var_dump($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo 404;
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        echo 405;
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // ... call $handler with $vars
//        var_dump($vars);
        $controller = new $handler[0];
        call_user_func([$controller,$handler[1]],$vars);
        break;
}
