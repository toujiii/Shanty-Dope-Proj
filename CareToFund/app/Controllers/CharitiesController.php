<?php
namespace CareToFund\Controllers;

//homepage and general pages
class CharitiesController {
    public function charities() {
        include __DIR__ . '/../../resources/views/components/charitiesPages/charities.php';
    }

    public function createCharity() {
        include __DIR__ . '/../../resources/views/components/charitiesPages/create-charity-modal.php';
    }

    public function createCharityProcess() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $description = trim($_POST['description'] ?? '');
            $fund_limit = floatval($_POST['fund_limit'] ?? 0);
            $duration = floatval($_POST['duration'] ?? 0);
            $id_type = trim($_POST['id_type'] ?? '');
            $id_number = trim($_POST['id_number'] ?? '');

            if (isset($_FILES['id_upload']) && isset($_FILES['face_front']) && isset($_FILES['face_side'])) {
                $id_upload = $_FILES['id_upload'];
                $face_front = $_FILES['face_front'];
                $face_side = $_FILES['face_side'];

                $new_id_upload_name = uniqid('id_', true) . '.png';
                $new_face_front_name = uniqid('face_front_', true) . '.png';
                $new_face_side_name = uniqid('face_side_', true) . '.png';

                //papalitan ung time() ng sa id o name ng user
                $folderName = 'charity_requests_attachments_' . time();
                $uploadDir = __DIR__ . '/../../resources/img/charity_requests_attachments/' . $folderName . '/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $idUploadPath = $uploadDir . $new_id_upload_name;
                $faceFrontPath = $uploadDir . $new_face_front_name;
                $faceSidePath = $uploadDir . $new_face_side_name;

                if (move_uploaded_file($id_upload['tmp_name'], $idUploadPath) &&
                    move_uploaded_file($face_front['tmp_name'], $faceFrontPath) &&
                    move_uploaded_file($face_side['tmp_name'], $faceSidePath)) {

                    require_once __DIR__ . '/../Models/CRUD.php';
                    $crud = new \CareToFund\Models\Crud('charity_request');

                    $charityData = [
                        'description' => $description,
                        'fund_limit' => $fund_limit,
                        'datetime' => date('Y-m-d H:i:s'),
                        'duration' => $duration,
                        'id_type_used' => $id_type,
                        'id_number' => $id_number,
                        'id_att_link' => 'resources/img/charity_requests_attachments/' . $folderName . '/' . $new_id_upload_name,
                        'front_face_link' => 'resources/img/charity_requests_attachments/' . $folderName . '/' . $new_face_front_name,
                        'side_face_link' => 'resources/img/charity_requests_attachments/' . $folderName . '/' . $new_face_side_name,
                        'status' => 'pending'
                    ];

                    $result = $crud->create($charityData);
                    
                    if ($result) {
                        echo json_encode(['success' => true]);
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Failed to save charity data.']);
                    }
                    exit;

                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to upload files.']);
                    
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'All fields are required.']);
            }

        } 
       
    }

    public function viewPendingCharity() {
        if($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once __DIR__ . '/../Models/CRUD.php';
            $crud = new \CareToFund\Models\Crud('charity_request');
            $pendingCharities = $crud->select('*', ['request_id' => '20']);
            echo json_encode($pendingCharities);
        }
    }

}

