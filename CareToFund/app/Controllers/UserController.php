<?php

namespace CareToFund\Controllers;

use CareToFund\Models\Crud;
// user-related actions (profile, registration, login)
class UserController
{
    protected $crud;
    protected $userId;

    public function __construct()
    {
        $this->crud = new Crud('users');
        $this->userId = $_SESSION['user_id'] ?? null;
    }

    public function getUserDetails()
    {
        $userDetails = $this->crud->select('*', ['id' => $this->userId]);
        return $userDetails;
    }

    public function updateUserDetails()
    {
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

    public function updateUserPassword()
    {
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

    public function uploadUserVerificationImages()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['user_front_image']) && isset($_FILES['user_side_image'])) {
                $user_face_front = $_FILES['user_front_image'];
                $user_face_side = $_FILES['user_side_image'];

                $new_face_front_name = 'face_front_' . $_SESSION['user_id'] . '.png';
                $new_face_side_name = 'face_side_' . $_SESSION['user_id'] . '.png';

                $folderName = 'verify_' . $_SESSION['user_id'];
                $uploadDir = __DIR__ . '/../../resources/img/user_verifications/' . $folderName . '/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $frontUploadPath = $uploadDir . $new_face_front_name;
                $sideUploadPath = $uploadDir . $new_face_side_name;

                if (
                    move_uploaded_file($user_face_front['tmp_name'], $frontUploadPath) &&
                    move_uploaded_file($user_face_side['tmp_name'], $sideUploadPath)
                ) {
                    $crud = new Crud('users');

                    $uploadData = [
                        'user_front_link' => 'resources/img/user_verifications/' . $folderName . '/' . $new_face_front_name,
                        'user_side_link' => 'resources/img/user_verifications/' . $folderName . '/' . $new_face_side_name,
                    ];

                    $crud->update($uploadData, ['id' => $_SESSION['user_id']]);
                } else {
                    echo "Error uploading files.";
                }
            }
        } else {
            echo "No files uploaded.";
        }
    }
}
