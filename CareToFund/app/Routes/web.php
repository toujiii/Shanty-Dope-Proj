<?php
// Define all routes here
require_once 'app/Controllers/HomeController.php';
$router->add('GET', '/', 'HomeController');

require_once 'app/Controllers/CharitiesController.php';
$router->add('GET', '/charities', ['CharitiesController', 'charities']); 

// Add more routes as needed
?>
