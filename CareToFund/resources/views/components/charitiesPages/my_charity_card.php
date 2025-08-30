<?php
    if(isset($_SESSION['user_id']) ){
?>
            <div class="container" id="myCharityCard">
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow-sm" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882); ; border-radius: 12px;">
                    <div class="container">
                        <p class="text-white fs-5 fw-bold mb-2 mt-3">
                            My Charit
                            <a data-bs-toggle="collapse" href="#charityDesc1" role="button" aria-expanded="false" aria-controls="charityDesc1" class="ms-0 text-white" style="cursor:pointer;">
                                <i id="charityToggle1" class="bi bi-caret-down-fill fs-5"></i>
                            </a>
                        </p>
                        <div class="collapse" id="charityDesc1">
                            <p id="charityDescription" class="text-white fs-6 mb-1"></p>
                            <p id="charityDatetime" class="m-0 mb-2 text-white" style="font-size: 0.9rem;"></p>
                        </div>

                        <div class="progress" style="height: 13px;">
                            <div id="charityProgress" class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar"
                                aria-label="Charity Progress"
                                style=" background-color: #1b3c53;"
                                aria-valuenow=""
                                aria-valuemin="0"
                                aria-valuemax="100">
                               
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                                <span id="charityRaised" class="fw-bold">₱ 400.00</span> / <span id="charityFundLimit">₱ 3,000.00</span>
                            </p>
                            <p id="charityDuration" class="m-0 text-white fw-bold" style="font-size: 0.9rem;">
                                
                            </p>
                        </div>
                        
                        <button class="btn btn-transparent text-white  mb-3 p-0 d-flex align-items-center gap-2"
                                data-bs-toggle="modal" 
                                data-bs-target="#donatorsModal"
                                style="font-size: 0.9rem;"
                                >
                            <i class="bi bi-people-fill fs-6"></i>
                            View Donators
                        </button>

                    </div>
                </div>
            </div>
<?php
    }
?>

