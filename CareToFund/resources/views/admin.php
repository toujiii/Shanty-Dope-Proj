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
        <div id="adminSidebar" class="col-auto px-0 " style="background-color: #1b3c53; min-width: 200px; max-width: 200px; ">
            <div class="h-100 d-flex flex-column align-items-center py-3 text-white">
                <div class="container" >
                    <div class="container d-flex justify-content-center border-bottom border-4 border-light" style="height: 100px;">
                        <img class="img-fluid" src="/Shanty-Dope-Proj/CareToFund/resources/img/website_logo.png" alt="logo">
                    </div>
                </div>
                <div class="container mt-4">
                    <h1 class="m-0 " style="font-size: 23px;">
                        Welcome Back, Admin!
                    </h1>
                    <p class="m-0 fs-6 mt-3">
                        See what's waiting for you today.
                    </p>
                </div>
                <div class="container mt-auto mb-5 d-flex justify-content-center">
                    <a href="/Shanty-Dope-Proj/CareToFund/resources/views/home.php">
                        <button class="btn btn-danger px-4">
                            Sign Out
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col px-0 d-flex flex-column">
           <nav class="navbar navbar-expand-sm navbar-light p-0 shadow-sm" style="background-color: #ffffffff; min-height: 56px;">
                <div class="container-fluid d-flex align-items-center flex-nowrap px-4">
                     <i class="bi bi-list me-3 fs-4 fw-bold" id="sidebarToggle" style="cursor:pointer;"></i>
                    <ul class="navbar-nav ms-auto d-flex flex-row gap-3">
                        <li class="nav-item">
                            <a class="nav-link" href="">Charities</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Users</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container py-4 flex-grow-1 hide-scrollbar" style="overflow-y: auto; max-height: calc(100vh - 56px);">
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

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function() {
        const sidebar = document.getElementById('adminSidebar');
        sidebar.classList.toggle('d-none');
    });
</script>
