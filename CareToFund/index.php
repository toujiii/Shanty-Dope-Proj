<?php
//Router ito, dito daraan mga request
session_start();
// session_unset();
// session_destroy();
require_once 'app/Routes/Router.php';

use CareToFund\Routes\Router;


$router = new Router();
require_once 'app/Routes/web.php'; // Load all routes from a separate file
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Automatically strip base path for routing
$basePath = '/Shanty-Dope-Proj/CareToFund';
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
    if ($uri === '' || $uri === '/') {
        $uri = '/';
    }
}

$router->dispatch($method, $uri);
?>