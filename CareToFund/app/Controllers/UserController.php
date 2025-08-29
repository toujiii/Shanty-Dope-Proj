<?php
namespace CareToFund\Controllers;

use CareToFund\Models\Crud;
// user-related actions (profile, registration, login)
class UserController {
    protected $crud;
    protected $userId;
    
    public function __construct() {
        $this->crud = new Crud('users');
        $this->userId = $_SESSION['user_id'] ?? null;
    }

    public function getUserDetails() {
        $userDetails = $this->crud->select('*', ['id' => $this->userId]);
        return $userDetails;
    }
    
    public function updateUserDetails() {
        // Fetch current user details
        $userDetails = $this->getUserDetails();
        // Example: get the user's current name and email
        $currentName = $userDetails[0]['name'] ?? '';
        $currentEmail = $userDetails[0]['email'] ?? '';

        // Get new details from POST data
        $name = $_POST['name'] ?? $currentName;
        $email = $_POST['email'] ?? $currentEmail;

        // Prepare data for update
        $updateData = [
            'name' => $name,
            'email' => $email,
            // Add other fields as needed
        ];

        // Update user details in the database
        $this->crud->update($updateData, ['id' => $this->userId]);
    }
}
