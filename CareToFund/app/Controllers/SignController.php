<?php
namespace CareToFund\Controllers;

//homepage and general pages
class SignController {
    public function sign_in() {
        include __DIR__ . '/../../resources/views/components/signPages/sign_in.php';
    }
    public function sign_up() {
        include __DIR__ . '/../../resources/views/components/signPages/sign_up.php';
    }
}
