<?php
// Define all routes here
require_once 'app/Controllers/HomeController.php';
$router->add('GET', '/', 'HomeController');

require_once 'app/Controllers/CharitiesController.php';
$router->add('GET', '/charities', ['CharitiesController', 'charities']); 

require_once 'app/Controllers/SignController.php';
$router->add('GET', '/sign_in', ['SignController', 'sign_in']);
$router->add('GET', '/sign_up', ['SignController', 'sign_up']);
$router->add('POST', '/signUpProcess', ['SignController', 'signUpProcess']);
// Add more routes as needed

require_once 'app/Controllers/AdminController.php';
$router->add('GET', '/admin', ['AdminController', 'index']);
?>
