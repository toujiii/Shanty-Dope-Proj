<?php
namespace CareToFund\Controllers;

use CareToFund\Controllers\UserController;
//homepage and general pages
class HomeController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
            $userController = new UserController();
            $userDetails = $userController->getUserDetails();
            echo 'Session is set for user_id: ' . $userDetails[0]['id'];
        } else {
            // User is not logged in
            echo 'No session set';
        }
        include __DIR__ . '/../../resources/views/components/homepages/home.php';
    }
    
}
