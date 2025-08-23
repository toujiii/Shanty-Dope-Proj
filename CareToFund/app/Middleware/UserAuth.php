<?php
namespace CareToFund\Middleware;

class UserAuth {
    public static function check() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }

    public static function requireAuth() {
        if (!self::check()) {
            header('Location: /Shanty-Dope-Proj/CareToFund/sign_in');
            exit;
        }
    }
}
