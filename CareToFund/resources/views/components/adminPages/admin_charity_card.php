<?php
if (empty($charities)) {
    include __DIR__ . '/admin_empty_record.php';
} else if (!empty($charities)) {
    foreach ($charities as $charity):
?>

        <div class="container">
            <div class="container bg-light my-3 px-4 py-2 shadow-sm" style=" border-radius: 12px;">
                <div class="container ">
                    <div class="d-flex  align-items-center gap-4">
                        <p class=" fw-bold my-2 d-flex align-items-center gap-2" style="color: #1b3c53; font-size: 0.9rem;">
                            <i class="bi bi-person-circle fs-3"></i>
                            <?php echo ucfirst($charity['name']); ?>
                        </p>
                        <?php if ($charity['charity_status'] === 'Ongoing'): ?>
                            <p class=" m-0 text-white px-3  ms-auto" style="background-color: #ffbd59; border-radius: 15px; width: fit-content; font-size: 0.9rem;">
                                On Going
                            </p>
                        <?php elseif ($charity['charity_status'] === 'Finished'): ?>
                            <p class="m-0 text-white px-3  ms-auto" style="background-color: #549f7b; border-radius: 15px; width: fit-content; font-size: 0.9rem;">
                                Finished
                            </p>
                        <?php elseif ($charity['charity_status'] === 'Cancelled'): ?>
                            <p class="m-0 text-white px-3  ms-auto" style="background-color: #c44949; border-radius: 15px; width: fit-content; font-size: 0.9rem;">
                                Cancelled
                            </p>
                        <?php endif; ?>
                    </div>

                    <p class="text-dark m-0" style="font-size: 0.9rem;">
                        <?php echo $charity['description']; ?>
                    </p>
                    <div class="d-flex mb-2">
                        <p class="m-0" style="color: #848484ff; border-radius: 15px; font-size: 0.8rem;">
                            <?php echo 'ID: ' . $charity['charity_id']; ?>
                        </p>
                        <p class="m-0 mx-1" style="color: #848484ff; font-size: 0.8rem;">
                            ●
                        </p>
                        <p class="m-0" style="font-size: 0.8rem; color: #848484ff;">
                            <?php echo date('M j, Y g:i a', strtotime($charity['approved_datetime'])); ?>
                        </p>
                    </div>

                    <div class="progress " style="height: 13px; border-radius: 10px; ">
                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                            role="progressbar"
                            aria-label="Charity Progress"
                            style="width: <?php echo ($charity['raised'] / $charity['fund_limit']) * 100; ?>%; background-color: #1b3c53;"
                            aria-valuenow="<?php echo ($charity['raised'] / $charity['fund_limit']) * 100; ?>"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            <?php echo round(($charity['raised'] / $charity['fund_limit']) * 100, 2); ?>%
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between pb-1">
                        <p class=" mt-2 mb-2" style="font-size: 0.8rem; color: #1b3c53;">
                            <span class="fw-bold">₱ <?php echo number_format($charity['raised'], 2); ?></span> / ₱ <?php echo number_format($charity['fund_limit'], 2); ?>
                        </p>
                        <p class="m-0 fw-bold" style="font-size: 0.8rem; color: #1b3c53;">
                            <?php if ($charity['charity_status'] !== 'Cancelled'): ?>
                                <span id="charityDuration<?php echo $charity['charity_id']; ?>"></span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="d-flex flex-md-row flex-column justify-content-between align-items-center pb-2 pt-3" style="border-top: 1px solid #9cabb6ff;">
                        <button class="btn btn-transparent p-0 d-flex align-items-center gap-2 m-0 mb-md-0 mb-3" style="color: #1b3c53; font-size: 0.9rem;"
                            onclick="loadDonators(<?php echo $charity['charity_id']; ?>)">
                            <i class="bi bi-people-fill fs-6"></i>
                            View Donators
                        </button>
                        <?php if ($charity['charity_status'] === 'Ongoing'): ?>
                            <button class="btn btn-red text-white px-2 py-1" style="border-radius: 8px; font-size: 0.8rem;"
                                data-bs-toggle="modal"
                                data-bs-target="#cancelCharityModal"
                                data-charity-id="<?php echo $charity['charity_id']; ?>"
                                data-user-id="<?php echo $charity['user_id']; ?>">
                                Cancel Charity
                            </button>
                        <?php elseif ($charity['charity_status'] === 'Finished'): ?>
                            <p class="m-0 fw-bold" style="font-size: 0.8rem; color: #549f7b;">
                                This Charity has raised a total of <span>₱ <?php echo number_format($charity['raised'], 2); ?></span>! 🎉
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script>
            startCountdown(
                "<?php echo $charity['approved_datetime']; ?>",
                "<?php echo $charity['duration']; ?>",
                "#charityDuration<?= $charity['charity_id']; ?>", {
                    onEnd: () => {
                        document.querySelector("#charityDuration<?= $charity['charity_id']; ?>").textContent = "Finished!";
                        // location.reload(); 
                    },
                    action: () => {
                        updateCharities();
                        viewCharities();
                        fetchUserStatus();
                    }
                }
            );
        </script>
<?php
    endforeach;
}
?>