<?php
namespace CareToFund\Controllers;

use CareToFund\Models\Crud;

date_default_timezone_set('Asia/Manila');

require_once __DIR__ . '/../Models/CRUD.php';
//admin and general pages
class AdminController {
    public function index() {
        include __DIR__ . '/../../resources/views/components/adminPages/admin.php';
    }

    public function render($view, $data = []) {
        extract($data); 
        require __DIR__ . '/../../resources/views/' . $view . '.php';
    }

    public function viewCharityRequests() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            $charity = new Crud('users');
            $charityRequests = $charity->join('charity_request','users.id = charity_request.user_id');

            $this->render('components/adminPages/admin_request_charity', [
                'charityRequests' => $charityRequests
            ]);
        }
    }

    public function approveCharityRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;
            $userId = $_POST['user_id'] ?? null;

            $crud = new \CareToFund\Models\Crud('charity_request');
            $crud->update(['request_status' => 'Approved', 'approved_datetime' => date('Y-m-d H:i:s')], ['request_id' => $requestId]);

            $updateUserStatus = new \CareToFund\Models\Crud('users');
            $updateUserStatus->update(['status' => 'Active'], ['id' => $userId]);

            $createNewCharity = new \CareToFund\Models\Crud('charity');
            $createNewCharity->create([
                'request_id' => $requestId,
                'raised' => 0,
                'charity_status' => 'Ongoing'
            ]);

            echo json_encode($requestId);

            // if ($updateResult) {
            //     echo json_encode(['success' => true, 'message' => 'Charity request approved.']);

            // } else {
            //     echo json_encode(['success' => false, 'message' => 'Failed to approve charity request.']);
            // }
        }
    }

    public function rejectCharityRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;
            $userId = $_POST['user_id'] ?? null;

            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('charity_request');


            $updateResult = $crud->update(['request_status' => 'Rejected'], ['request_id' => $requestId]);

            require_once __DIR__ . '/../Models/CRUD.php';
            $updateUserStatus = new \CareToFund\Models\Crud('users');
            $updateUserStatus->update(['status' => 'Offline'], ['id' => $userId]);

            if ($updateResult) {
                echo json_encode(['success' => true, 'message' => 'Charity request rejected.']);

            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to reject charity request.']);
            }
        }
    }

    public function getCharityRequestDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;

            $charity = new Crud('users');
            $requestDetails = $charity->join('charity_request','users.id = charity_request.user_id', ['request_id' => $requestId]);

            $this->render('components/adminPages/admin_attachments_modal', [
                'requestDetails' => $requestDetails
            ]);
        }
    }

}

