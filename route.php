<?php

use App\Controllers\AdminController\AdminController;
use App\Controllers\AdminController\CourseController;
use App\Controllers\ClientController\HomeController;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();
$router->group(['prefix' => 'ezcode'], function ($router) {
    $router->get('/', [HomeController::class, 'index']);
    $router->get('/abc', [HomeController::class, 'index']);
    $router->group(['prefix' => 'admin'], function ($router) {
        $router->get('/', [AdminController::class, 'index']);
        $router->group(['prefix' => 'courses'], function ($router) {
            $router->get('/', [CourseController::class, 'listCourse']);
        });
    });
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
