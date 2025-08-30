<?php
namespace CareToFund\Routes;
// Define all routes here
require_once 'app/Controllers/UserController.php';
require_once 'app/Middleware/Session.php';

require_once 'app/Controllers/HomeController.php';
$router->add('GET', '/', 'HomeController');

// Header
require_once 'app/Controllers/HeaderController.php';
$router->add('GET', '/header', ['HeaderController', 'show']);

//Charities only
//User
require_once 'app/Controllers/CharitiesController.php';
$router->add('GET', '/charities', ['CharitiesController', 'charities']);
$router->add('GET', '/create_charity', ['CharitiesController', 'createCharity']);
$router->add('POST', '/createCharityProcess', ['CharitiesController', 'createCharityProcess']);
$router->add('GET', '/loadPendingCharity', ['CharitiesController', 'loadPendingCharity']);
$router->add('GET', '/fetchUserStatus', ['CharitiesController', 'fetchUserStatus']);
$router->add('GET', '/loadMyCharity', ['CharitiesController', 'loadMyCharity']);
$router->add('POST', '/updateCharity', ['CharitiesController', 'updateCharity']);
$router->add('GET', '/loadCharities', ['CharitiesController', 'loadCharities']);
$router->add('POST', '/sendDonation', ['CharitiesController', 'sendDonation']);

//Admin
$router->add('GET', '/viewCharityRequests', ['AdminController', 'viewCharityRequests']);
$router->add('POST', '/approveCharityRequest', ['AdminController', 'approveCharityRequest']);
$router->add('POST', '/rejectCharityRequest', ['AdminController', 'rejectCharityRequest']);
$router->add('POST', '/getCharityRequestDetails', ['AdminController', 'getCharityRequestDetails']);
$router->add('GET', '/viewCharities', ['AdminController', 'viewCharities']);



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
$router->group(['middleware' => 'user'], function($router) {
	$router->add('POST', '/signOut', ['SignController', 'signOut']);
	$router->add('POST', '/updateUser', ['UserController', 'updateUserDetails']);
	$router->add('POST', '/updateUserPassword', ['UserController', 'updateUserPassword']);
});



require_once 'app/Controllers/AdminController.php';
$router->add('GET', '/admin', ['AdminController', 'index']);

?>
