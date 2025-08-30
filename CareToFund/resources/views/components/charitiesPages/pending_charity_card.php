<?php 
    if(isset($_SESSION['user_id'])) {
?>
            <div class="container" id="idPendingCharity">
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882);  border-radius: 12px;">
                    <div class="container d-flex justify-content-between align-items-center py-3 px-0 border-bottom border-3 border-light">
                        <p class="m-0 text-white fs-5 fw-bold" >
                            Pending for Approval...
                        </p>
                        <button class="btn btn-red px-3 py-1" 
                                style="border-radius: 10px; font-size: 0.9rem;"
                                data-bs-toggle="modal" 
                                data-bs-target="#abortCharityModal">
                            Abort Charity
                        </button>

                    </div>
                    <div class="container px-0">
                        <p id="pendingDescription" class="m-0 text-white fs-6 pt-2">
                        
                        </p>
                        <p id="pendingDatetime" class="m-0 pb-3 text-white" style="font-size: 0.9rem;">
                            
                        </p>
                    </div>
                    <div class="container px-0 pb-3 d-flex align-items-center gap-4">
                        <p class="text-white m-0 fw-bold d-flex align-items-center gap-2" style="font-size: 0.9rem;">
                            <i class="bi bi-flag-fill fs-5"></i>
                            <span id="pendingFundLimit"></span>
                        </p>
                        <p class="text-white m-0  fw-bold d-flex align-items-center gap-2" style="font-size: 0.9rem;">
                            <i class="bi bi-stopwatch-fill fs-5"></i>
                            <span id="pendingDuration"></span>
                        </p>
                    </div>
                </div>
            </div>
<?php
    } 
?>

