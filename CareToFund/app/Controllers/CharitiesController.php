<?php
namespace CareToFund\Controllers;

//homepage and general pages
class CharitiesController {
    public function charities() {
        include __DIR__ . '/../../resources/views/components/charitiesPages/charities.php';
    }
    
}

