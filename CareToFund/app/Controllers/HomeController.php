<?php
namespace CareToFund\Controllers;

//homepage and general pages
class HomeController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
        // User is logged in
        // You can show user-specific content or debug:
        echo 'Session is set for user_id: ' . $_SESSION['user_id'];
        } else {
            // User is not logged in
            echo 'No session set';
        }
        include __DIR__ . '/../../resources/views/components/homepages/home.php';
    }
    
}
