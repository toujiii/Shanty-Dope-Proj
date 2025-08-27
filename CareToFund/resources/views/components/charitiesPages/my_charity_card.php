<?php
    if(isset($_SESSION['user_id']) ){
        echo '
            <div class="container" id="myCharityCard">
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882); ; border-radius: 12px;">
                    <div class="container">
                        <p class="text-white fs-3 fw-bold my-2">
                            My Charity
                            <a data-bs-toggle="collapse" href="#charityDesc1" role="button" aria-expanded="false" aria-controls="charityDesc1" class="ms-0 text-white" style="cursor:pointer;">
                                <i id="charityToggle1" class="bi bi-caret-down-fill fs-5"></i>
                            </a>
                        </p>
                        <div class="collapse" id="charityDesc1">
                            <p class="text-white fs-6 mb-1">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                            <p class="m-0 mb-2 text-white" style="font-size: 0.9rem;">
                                3:10 PM Jan 15, 2025
                            </p>
                        </div>
                        
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar"
                                aria-label="Charity Progress"
                                style="width: 25%; background-color: #1b3c53;"
                                aria-valuenow="25"
                                aria-valuemin="0"
                                aria-valuemax="100">
                                25%
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                                <span class="fw-bold">₱ 400.00</span> / ₱ 3,000.00
                            </p>
                            <p class="m-0 text-white fw-bold" style="font-size: 0.9rem;">
                                5 Days Left...
                            </p>
                        </div>
                        
                        <button class="btn btn-transparent fs-6 text-white fw-bold mb-3 p-0 d-flex align-items-center gap-2"
                                data-bs-toggle="modal" 
                                data-bs-target="#donatorsModal">
                            <i class="bi bi-people-fill fs-5"></i>
                            View Donators
                        </button>

                    </div>
                </div>
            </div>
        ';
    }
?>

