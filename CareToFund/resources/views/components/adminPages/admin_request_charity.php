
<?php foreach ($charityRequests as $result): ?>
    <div class="container " >
        <div class="container bg-light my-3 px-4 py-2 shadow-sm d-flex align-items-center flex-column" style=" border-radius: 12px; ">
            <div class="d-flex gap-2 w-100 justify-content-between py-2" style="border-bottom: 2.3px solid #1b3c53;">
                <div class="d-flex gap-3 align-items-center">
                     <p class="m-0 fs-6 fw-bold" style="color: #1b3c53;">
                            <?php  
                                if($result['request_status'] === "Pending") {
                                    echo ucfirst($result['name']) . " has a new charity request."; 
                                } elseif ($result['request_status'] === "Approved" || $result['request_status'] === "Rejected") {
                                    echo ucfirst($result['name']) . "'s charity request."; 
                                }
                            ?>
                        </p>
                </div>
                <?php if($result['request_status'] === "Pending"): ?>
                    <div class="d-flex align-items-center gap-0">
                    <button class="btn btn-success px-2 py-0" style="border-radius: 10px; font-size: 0.9rem; color: white;" 
                        data-bs-toggle="modal" data-bs-target="#admin_request_approval" 
                        data-request-id="<?php echo $result['request_id']; ?>"
                        data-user-id="<?php echo $result['user_id']; ?>"
                    >
                        <i class="bi bi-check2 fs-5"></i>
                    </button>
                    <button class="btn btn-danger px-2 py-0 ms-2" style="border-radius: 10px; font-size: 0.9rem; color: white;"
                        data-bs-toggle="modal" data-bs-target="#admin_request_rejection" 
                        data-request-id="<?php echo $result['request_id']; ?>"
                        data-user-id="<?php echo $result['user_id']; ?>"
                    >
                        <i class="bi bi-x-lg fs-5 "></i>
                    </button> 
                </div> 
                <?php endif; ?>
            </div>
            <div class="container mt-2 p-0">
                <p class="text-dark fs-6 m-0">
                    <?php echo $result['description']; ?>
                </p>
                <p class="m-0 " style="font-size: 0.9rem; color: #848484ff;">
                    <?php echo date('M j, Y g:i a', strtotime($result['datetime'])); ?>
                </p>
                <p class="m-0 py-3 " style="cursor: pointer; color: #1b3c53; font-size: 0.9rem; width: fit-content;"
                    data-bs-toggle="modal" 
                    data-bs-target="#requestDetailsModal" 
                    onclick="getCharityRequestDetails( '<?php echo $result['request_id']; ?>')"
                >
                    See More...
                </p>
                
            </div>
            <div class="container pb-2 px-0 d-flex flex-wrap  align-items-center gap-4 justify-content-start">
                <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2" style="color: #1b3c53;">
                    <i class="bi bi-flag-fill fs-6"></i>
                    ₱ <?php echo number_format($result['fund_limit'], 2); ?>
                </p>
                <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2" style="color: #1b3c53;">
                    <i class="bi bi-stopwatch-fill fs-6"></i>
                    <?php echo $result['duration']; ?> Days
                </p>
                <?php if($result['request_status'] === "Approved") { ?>
                    <p class="m-0 ms-0 ms-sm-auto text-white bg-success px-3 d-flex align-items-center" style="border-radius: 10px; width: fit-content; font-size: 0.9rem;">
                        Approved
                    </p>
                <?php } elseif($result['request_status'] === "Pending") { ?>
                    <p class="m-0 ms-0 ms-sm-auto text-white bg-warning px-3 d-flex align-items-center" style="border-radius: 10px; width: fit-content; font-size: 0.9rem;">
                        Pending
                    </p>
                <?php } elseif($result['request_status'] === "Rejected") { ?>
                    <p class="m-0 ms-0 ms-sm-auto text-white  bg-danger px-3 d-flex align-items-center" style="border-radius: 10px; width: fit-content; font-size: 0.9rem;">
                        Rejected
                    </p>
                <?php } ?>
            </div>
        </div>
    </div> 
<?php endforeach; ?>