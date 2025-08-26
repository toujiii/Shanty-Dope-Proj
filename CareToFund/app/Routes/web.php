<?php
namespace CareToFund\Routes;
// Define all routes here
require_once 'app/Middleware/Session.php';

require_once 'app/Controllers/HomeController.php';
$router->add('GET', '/', 'HomeController');

require_once 'app/Controllers/CharitiesController.php';
$router->add('GET', '/charities', ['CharitiesController', 'charities']);
$router->add('GET', '/create_charity', ['CharitiesController', 'createCharity']);
$router->add('POST', '/createCharityProcess', ['CharitiesController', 'createCharityProcess']);
$router->add('GET', '/viewPendingCharity', ['CharitiesController', 'viewPendingCharity']);

// $router->group(['middleware' => ['CareToFund\Middleware\UserAuth::requireAuth']], function($router) {
// 	require_once 'app/Controllers/AdminController.php';
// 	$router->add('GET', '/admin', ['AdminController', 'index']);
// }); Sample usage of group

require_once 'app/Controllers/SignController.php';
$router->group(['middleware' => 'guest'], function($router) {
	$router->add('GET', '/sign_in', ['SignController', 'sign_in']);
	$router->add('GET', '/sign_up', ['SignController', 'sign_up']);
	$router->add('POST', '/signUpProcess', ['SignController', 'signUpProcess']);
	$router->add('POST', '/signInProcess', ['SignController', 'signInProcess']);
});


require_once 'app/Controllers/AdminController.php';
$router->add('GET', '/admin', ['AdminController', 'index']);
?>
