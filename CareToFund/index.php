<?php
//Router ito, dito daraan mga request

require_once 'app/Routes/Router.php';
require_once 'app/Routes/web.php'; // Load all routes from a separate file
use CareToFund\Controllers\Router;


$router = new Router();
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = rtrim($uri, '/');
if ($uri === '/Shanty-Dope-Proj/CareToFund' || $uri === '/Shanty-Dope-Proj/CareToFund/' || $uri === '') {
    $uri = '/';
}

$router->dispatch($method, $uri);
?>