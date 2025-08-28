<?php
namespace CareToFund\Controllers;

//admin and general pages
class AdminController {
    public function index() {
        include __DIR__ . '/../../resources/views/components/adminPages/admin.php';
    }

    public function viewCharityRequests() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../Models/CRUD.php';

            $crudCharity = new \CareToFund\Models\Crud('charity_request');
            $crudUsers   = new \CareToFund\Models\Crud('users');

            $charityRequests = $crudCharity->select('*');

            foreach ($charityRequests as &$request) {
                $user_id = $request['user_id'];
                
                $userData = $crudUsers->select('name', ['id' => $user_id]);

                // If user exists, append the name to the request row
                if (!empty($userData) && isset($userData[0]['name'])) {
                    $request['name'] = ucfirst($userData[0]['name']);
                } else {
                    $request['name'] = null; // or 'Unknown'
                }
            }

            // Return JSON with appended name field
            echo json_encode($charityRequests);
        }
    }

    public function approveCharityRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;
            $userId = $_POST['user_id'] ?? null;

            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('charity_request');

 
            $updateResult = $crud->update(['request_status' => 'Approved'], ['request_id' => $requestId]);

            require_once __DIR__ . '/../Models/CRUD.php';
            $updateUserStatus = new \CareToFund\Models\Crud('users');
            $updateUserStatus->update(['status' => 'Active'], ['id' => $userId]);

            if ($updateResult) {
                echo json_encode(['success' => true, 'message' => 'Charity request approved.']);

            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to approve charity request.']);
            }
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

            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('charity_request');

            $requestDetails = $crud->select('*', ['request_id' => $requestId]);

            echo json_encode($requestDetails);
        }
    }
}
