<?php 
    if(isset($_SESSION['user_id'])) {
    
?>
            <div class="container" id="idPendingCharity">
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882);  border-radius: 12px;">
                    <div class="container d-flex justify-content-between align-items-center py-3 px-0 border-bottom border-3 border-light">
                        <p class="m-0 text-white fs-5 fw-bold" >
                            Pending for Approval...
                        </p>
                    </div>
                    <div class="container px-0">
                        <p id="pendingDescription" class="m-0 text-white fs-6 pt-2">
                            <?php echo $pendingCharities[0]['description']; ?>
                        </p>
                        <p id="pendingDatetime" class="m-0 pb-3 text-white" style="font-size: 0.9rem;">
                            <?php echo date('M j, Y g:i a', strtotime($pendingCharities[0]['datetime'])); ?>
                        </p>
                    </div>
                    <div class="container px-0 pb-3 d-flex align-items-center gap-4">
                        <p class="text-white m-0 fw-bold d-flex align-items-center gap-2" style="font-size: 0.9rem;">
                            <i class="bi bi-flag-fill fs-5"></i>
                            ₱ <?php echo number_format($pendingCharities[0]['fund_limit'], 2); ?>
                        </p>
                        <p class="text-white m-0  fw-bold d-flex align-items-center gap-2" style="font-size: 0.9rem;">
                            <i class="bi bi-stopwatch-fill fs-5"></i>
                            <?php echo $pendingCharities[0]['duration']; ?> Day/s
                        </p>
                    </div>
                </div>
            </div>
<?php
    } 
?>

