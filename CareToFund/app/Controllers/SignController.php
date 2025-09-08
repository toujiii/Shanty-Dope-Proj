<?php
namespace CareToFund\Controllers;

//homepage and general pages
class SignController {
    // Handles sign in form submission
    
    public function sign_in() {
        include __DIR__ . '/../../resources/views/components/signPages/sign_in.php';
    }
    public function sign_up() {
        include __DIR__ . '/../../resources/views/components/signPages/sign_up.php';
    }

    // Handles sign up form submission
    public function signUpProcess() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            $confirm_password = trim($_POST['confirm_password'] ?? '');
            $gcash_number = trim($_POST['gcash'] ?? '');

            // Basic validation
            if (!$name || !$email || !$password || !$confirm_password || !$gcash_number) {
                echo 'All fields are required.';
                return;
            }
            if ($password !== $confirm_password) {
                echo 'Passwords do not match.';
                return;
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare user data
            $userData = [
                'name' => $name,
                'email' => $email,
                'password' => $hashedPassword,
                'gcash_number' => $gcash_number,
                'status' => 'offline'
            ];

            // Insert into database
            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('users');
            $result = $crud->create($userData);
            if ($result) {
                header('Location: /Shanty-Dope-Proj/CareToFund/sign_in');
                exit;
            } else {
                echo 'Sign up failed.';
            }
        } else {
            echo 'Invalid request.';
        }
    }
    // Handles sign in form submission
    public function signInProcess() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '')  ;

            if (!$email || !$password) {
                echo 'Email and password are required.';
                return;
            }

            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('users');
            $user = $crud->readByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Set admin session if user role is admin
                if ($user['role'] === 'admin') {
                    $_SESSION['is_admin'] = true;
                    header('Location: /Shanty-Dope-Proj/CareToFund/admin');
                    exit;
                } else {
                    $_SESSION['is_admin'] = false;
                    $_SESSION['user_id'] = $user['id'];
                }
                // Redirect to dashboard or home page
                header('Location: /Shanty-Dope-Proj/CareToFund/charities');
                exit;
            } else {
                echo "<script>alert('Invalid email or password.'); window.location.href='/Shanty-Dope-Proj/CareToFund/sign_in';</script>";
            }
        } else {
            echo 'Invalid request.';
        }
    }
    
    public function signOut() {
        // Clear session and redirect to sign in page
        session_unset();
        session_destroy();
        header('Location: /Shanty-Dope-Proj/CareToFund/');
        exit;
    }
}
