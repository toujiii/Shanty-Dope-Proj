<nav class="navbar navbar-expand-sm navbar-light p-0" style="background-color: #F9F3EF;">
    <div class="container">
        <a class="navbar-brand p-0" href="/Shanty-Dope-Proj/CareToFund/">
            <img src="/Shanty-Dope-Proj/CareToFund/resources/img/website_logo.png" alt="CareToFund Logo" width="90" height="90">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav gap-lg-4 gap-3 align-items-center mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active fs-6" aria-current="page" href="/Shanty-Dope-Proj/CareToFund/" style="color:#1B3C53">Home</a>
                </li>
                <li class="nav-item me-lg-5">
                    <a class="nav-link fs-6" href="/Shanty-Dope-Proj/CareToFund/charities" style="color:#1B3C53">Charities</a>
                </li>
                <li class="nav-item">
                    <a class="btn px-4 py-2 w-100 w-lg-auto btn-signup text-decoration-none" style="border-radius: 12px; color: white; font-size: 0.9rem;" href="/Shanty-Dope-Proj/CareToFund/sign_in">Sign In</a>
                </li>
               <button 
                    class="d-flex align-items-center justify-content-center gap-2 bg-transparent border-0"
                    style="cursor: pointer;"
                    data-bs-toggle="modal" 
                    data-bs-target="#profileModal">
                    <img src="/Shanty-Dope-Proj/CareToFund/resources/img/user-profile.png" 
                        alt="User Profile" width="40" height="40">
                    <p class="m-0 fw-bold" style="color:#1B3C53">John Doe</p>
                </button>
            </ul>
        </div>
    </div>
</nav>

<?php include __DIR__ . '/components/usermodalPages/profile-modal.php'; ?>
<?php include __DIR__ . '/components/usermodalPages/edit-details-modal.php'; ?>
<?php include __DIR__ . '/components/usermodalPages/reset-password-modal.php'; ?>




