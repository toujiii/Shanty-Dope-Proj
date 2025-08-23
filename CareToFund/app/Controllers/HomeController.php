<?php
namespace CareToFund\Controllers;

//homepage and general pages
class HomeController {
    public function index() {
        include __DIR__ . '/../../resources/views/components/homepages/home.php';
    }
    
}
