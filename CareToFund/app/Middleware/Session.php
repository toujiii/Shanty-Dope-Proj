<?php
namespace CareToFund\Middleware;

class Session {
    public function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? null;
    }

    public function destroy() {
        session_unset();
        session_destroy();
    }
    
}
function guest() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    echo 'Guest middleware called<br>'; // Debug
    print_r($_SESSION); 
    if (isset($_SESSION['user_id'])) {
        header('Location: /Shanty-Dope-Proj/CareToFund/'); // Redirect to home or dashboard
        exit;
    }
}
