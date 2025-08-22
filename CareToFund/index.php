<?php
//Router ito, dito daraan mga request

require_once 'app/Routes/Router.php';
require_once 'app/Controllers/UserController.php';
require_once 'app/Controllers/HomeController.php';

use CareToFund\Controllers\Router;
use CareToFund\Controllers\UserController;
use CareToFund\Controllers\HomeController;

$router = new Router();
$router->add('GET', '/', [HomeController::class, 'index']);
// $router->add('GET', '/users', [UserController::class, 'index']);
// $router->add('GET', '/users/show', [UserController::class, 'show']);


$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '/Shanty-Dope-Proj/CareToFund' || $uri === '/Shanty-Dope-Proj/CareToFund/' || $uri === '/Shanty-Dope-Proj/CareToFund/index.php' || $uri === '') {
    $uri = '/';
}

$router->dispatch($method, $uri);
