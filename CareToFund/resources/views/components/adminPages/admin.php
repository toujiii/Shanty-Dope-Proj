<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <?php include __DIR__ . '/components/head_assets.php'; ?>
</head>

<body>

<div class="container-fluid">
    <div class="row min-vh-100">

        <?php include __DIR__ . '/components/admin_sidebar.php'; ?>

        <div class="col px-0 d-flex flex-column">

            <?php include __DIR__ . '/components/admin_navbar.php'; ?>

            <div class="container-fluid py-4 flex-grow-1 hide-scrollbar" style="overflow-y: auto; max-height: calc(100vh - 56px);">
                <?php 
                    // include __DIR__ . '/components/admin_charities_layout.php'; 
                ?>
                <?php 
                    // include __DIR__ . '/components/admin_requests_layout.php'; 
                ?>
                <?php 
                    include __DIR__ . '/components/admin_users_layout.php'; 
                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script src="../js/side-bar-toggle.js"></script>
