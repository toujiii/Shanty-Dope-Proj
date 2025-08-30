<?php
namespace CareToFund\Controllers;

use CareToFund\Controllers\HeaderController;
    
//homepage and general pages
class HomeController {
    public function index() {
        echo 'Session is set for user_id: ' . $_SESSION['user_id'];
        $headerController = new HeaderController();
        $headerController->show();
        include __DIR__ . '/../../resources/views/components/homepages/home.php';
    }
}
