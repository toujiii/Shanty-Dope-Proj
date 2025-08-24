<?php
namespace CareToFund\Controllers;

//admin and general pages
class AdminController {
    public function index() {
        include __DIR__ . '/../../resources/views/components/adminPages/admin.php';
    }
    
}
