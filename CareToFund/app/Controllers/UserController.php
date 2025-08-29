<?php
namespace CareToFund\Controllers;

use CareToFund\Models\Crud;
// user-related actions (profile, registration, login)
class UserController {
    protected $crud;
    
    public function __construct() {
        $this->crud = new Crud('users');
    }

    public function getUserDetails() {
        $userId = $_SESSION['user_id'];
        $userDetails = $this->crud->select('*', ['id' => $userId]);
        return $userDetails;
    }
    
    public function updateUserDetails() {
        $userId = $_SESSION['user_id'];
        // Get other user details from POST data
        // Update user details in the database
    }
}
