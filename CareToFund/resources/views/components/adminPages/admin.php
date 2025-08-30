<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include __DIR__ . '../../../head_assets.php'; ?>
</head>

<body>

<div class="container-fluid">
    <div class="row min-vh-100">

        <?php include __DIR__ . '/admin_sidebar.php'; ?>

        <div class="col px-0 d-flex flex-column">

            <?php include __DIR__ . '/admin_navbar.php'; ?>

            <div class="container-fluid py-4 flex-grow-1 hide-scrollbar" style="overflow-y: auto; max-height: calc(100vh - 56px);">
                <?php
                    $section = $_GET['section'] ?? 'charities';
                    if ($section === 'charities') {
                        include __DIR__ . '/admin_charities_layout.php';
                    } elseif ($section === 'requests') {
                        include __DIR__ . '/admin_requests_layout.php';
                    } elseif ($section === 'users') {
                        include __DIR__ . '/admin_user_layout.php';
                    }
                ?>
            </div>
        </div>
    </div>
</div>



</body>
</html>
<script src="/Shanty-Dope-Proj/CareToFund/resources/js/side-bar-toggle.js"></script>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/base_ajax_requests.js"></script>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/admin_ajax_requests.js"></script>
