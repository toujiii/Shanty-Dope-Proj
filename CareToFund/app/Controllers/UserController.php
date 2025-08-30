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

        $this->crud->update($updateData, ['id' => $this->userId]);
    }

    public function updateUserPassword() {
        header('Content-Type: application/json');
        $currentPassword = $_POST['currentPassword'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';

        if ($this->userId) {
            $userDetails = $this->getUserDetails();
            $hashedCurrentPassword = $userDetails[0]['password'] ?? '';
            if (!password_verify($currentPassword, $hashedCurrentPassword)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Current password is incorrect.'
                ]);
                return;
            }
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $this->crud->update(['password' => $hashedNewPassword], ['id' => $this->userId]);
            echo json_encode([
                'success' => true,
                'message' => 'Password updated successfully.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'User not found.'
            ]);
        }
    }
}
