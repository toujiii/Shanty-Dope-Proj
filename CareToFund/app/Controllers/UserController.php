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
        $userDetails = $this->getUserDetails();
        $currentName = $userDetails[0]['name'] ?? '';
        $currentEmail = $userDetails[0]['email'] ?? '';

        $name = $_POST['name'] ?? $currentName;
        $email = $_POST['email'] ?? $currentEmail;

        $updateData = [
            'name' => $name,
            'email' => $email,
        ];

        $result = $this->crud->update($updateData, ['id' => $this->userId]);
        // For debug only, comment out if gumana
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'User details updated successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Update failed.']);
        }
    }
}
