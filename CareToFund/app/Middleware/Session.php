<?php

function guest() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if (!empty($_SESSION['user_id'])) {
        header('Location: /Shanty-Dope-Proj/CareToFund/');
        exit;
    }
}
