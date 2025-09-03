<?php

function guest() {
    if (!empty($_SESSION['user_id'])) {
        header('Location: /Shanty-Dope-Proj/CareToFund/');
        exit;
    }
}

function user(){
    if (empty($_SESSION['user_id'])) {
        header('Location: /Shanty-Dope-Proj/CareToFund/sign_in');
        exit;
    }
}

function admin() {
    if (empty($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
        header('Location: /Shanty-Dope-Proj/CareToFund/');
        exit;
    }
}