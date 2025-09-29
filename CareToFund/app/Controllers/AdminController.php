<?php

namespace CareToFund\Controllers;

use CareToFund\Models\Crud;
use CareToFund\Controllers\UserController;

date_default_timezone_set('Asia/Manila');

require_once __DIR__ . '/../Models/CRUD.php';

//admin and general pages
class AdminController
{
    public function index()
    {
        include __DIR__ . '/../../resources/views/components/adminPages/admin.php';
    }

    public function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . '/../../resources/views/' . $view . '.php';
    }

    public function viewCharityRequests()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = $_GET['filter'] ?? null;
            $search = $_GET['search'] ?? null;

            $where = [];
            $like = [];
            $charity = new Crud('users');

            if (!is_null($filter)) {
                $where['charity_request.request_status'] = $filter;
            }

            if (!is_null($search)) {
                $like['charity_request.description'] = $search;
                $like['users.name'] = $search;
                $like['charity_request.request_id'] = $search;
            }

            $charityRequests = $charity->join(
                'charity_request',
                'users.id = charity_request.user_id',
                $where,
                "FIELD(charity_request.request_status, 'Pending') DESC, charity_request.datetime DESC",
                'DESC',
                null,
                $like
            );

            $this->render('components/adminPages/admin_request_charity', [
                'charityRequests' => $charityRequests
            ]);
        }
    }

    public function viewCharities()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filter = $_GET['filter'] ?? null;
            $search = $_GET['search'] ?? null;

            $where = [];
            $like = [];
            $charity = new Crud('charity');

            if (!is_null($filter)) {
                $where['charity.charity_status'] = $filter;
            }

            if (!is_null($search)) {
                $like['charity_request.description'] = $search;
                $like['charity.charity_id'] = $search;
                $like['users.name'] = $search;
            }

            $charities = $charity->join(
                'charity_request INNER JOIN users ON charity_request.user_id = users.id',
                'charity.request_id = charity_request.request_id',
                $where,
                'charity_request.approved_datetime',
                'DESC',
                null,
                $like
            );

            $this->render('components/adminPages/admin_charity_card', [
                'charities' => $charities,
            ]);
        }
    }

    public function charityRequestConfirmation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;
            $userId = $_POST['user_id'] ?? null;
            $confirmation = $_POST['confirmation'] ?? null;

            $crud = new Crud('charity_request');
            $updateUserStatus = new Crud('users');
            $approveDate = new Crud('charity_request');
            $createNewCharity = new Crud('charity');

            if ($confirmation === 'approve') {
                $updateUserStatus->update(['status' => 'Active'], ['id' => $userId]);

                $approveDate->update(['request_status' => 'Approved', 'approved_datetime' => date('Y-m-d H:i:s')], ['request_id' => $requestId]);

                $createNewCharity->create([
                    'request_id' => $requestId,
                    'raised' => 0,
                    'charity_status' => 'Ongoing'
                ]);
            } else if ($confirmation === 'reject') {
                $updateResult = $crud->update(['request_status' => 'Rejected'], ['request_id' => $requestId]);
                $updateUserStatus->update(['status' => 'Offline'], ['id' => $userId]);
            }

            if ($updateResult) {
                echo json_encode(['success' => true, 'message' => 'Charity request successfully confirmed.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Charity request confirmation failed.']);
            }
        }
    }

    public function getCharityRequestDetails()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $requestId = $_POST['request_id'] ?? null;

            $charity = new Crud('users');
            $requestDetails = $charity->join('charity_request', 'users.id = charity_request.user_id', ['request_id' => $requestId]);

            $this->render('components/adminPages/admin_attachments_modal', [
                'requestDetails' => $requestDetails
            ]);
        }
    }

    public function cancelCharity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $charityId = $_POST['charity_id'] ?? null;
            $userId = $_POST['user_id'] ?? null;

            $charityStatus = new Crud('charity');
            $userStatus = new Crud('users');
            $updateCharityStatus = $charityStatus->update(['charity_status' => 'Cancelled'], ['charity_id' => $charityId]);
            $updateUserStatus = $userStatus->update(['status' => 'Offline'], ['id' => $userId]);

            if ($updateCharityStatus && $updateUserStatus) {
                echo json_encode(['success' => true, 'message' => 'Charity canceled successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to cancel charity.']);
            }
        }
    }

    public function getAllUsers() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $search = $_GET['search'] ?? null;
            
            $crud = new Crud('users');
            $where = ['role' => NULL];
            $like = [];

            if (!is_null($search)) {
                $like['name'] = $search;
                // Bahala kayo pero gusto ko to
                $like['email'] = $search;
                // $like['gcash_number'] = $search;
                // $like['id'] = $search;
            }

            $users = $crud->select('*', $where, null, null, null, $like);
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = 10;
            $totalUsers = count($users);
            $totalPages = ceil($totalUsers / $perPage);
            $start = ($page - 1) * $perPage;
            $pagedUsers = array_slice($users, $start, $perPage);
            $this->render('components/adminPages/admin_user_show', [
                'users' => $pagedUsers,
                'totalPages' => $totalPages,
                'currentPage' => $page
            ]);
        }
        // $crud = new Crud('users');
        // $users = $crud->select('*', ['role' => NULL]);
        // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // $perPage = 10;
        // $totalUsers = count($users);
        // $totalPages = ceil($totalUsers / $perPage);
        // $start = ($page - 1) * $perPage;
        // $pagedUsers = array_slice($users, $start, $perPage);
        // $this->render('components/adminPages/admin_user_show', [
        //     'users' => $pagedUsers,
        //     'totalPages' => $totalPages,
        //     'currentPage' => $page
        // ]);
    }

    public function editUser() {
        $crud = new Crud('users');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'] ?? null;
            $name = $_POST['name'] ?? null;
            $email = $_POST['email'] ?? null;

            // If only user_id is sent, render the modal with user data
            if ($userId && !$name && !$email) {
                $user = $crud->select('*', ['id' => $userId]);
                $this->render('components/adminPages/admin_user_edit_modal', [
                    'user' => $user[0]
                ]);
                exit;
            }

            // If updating user
            if ($userId && $name && $email) {
                $updateData = [
                    'name' => $name,
                    'email' => $email,
                ];
                $result = $crud->update($updateData, ['id' => $userId]);
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'User updated successfully.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to update user.']);
                }
                exit;
            }

            echo json_encode(['success' => false, 'message' => 'Invalid request.']);
            exit;
        }
    }

    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'] ?? null;
            if ($userId) { 
                $crud = new Crud('users');
                $result = $crud->delete(['id' => $userId]);
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'User deleted successfully.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to delete user.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'User ID is required.']);
            }
        }
    }
}

