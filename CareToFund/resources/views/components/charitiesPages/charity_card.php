<?php foreach ($userCharities as $charity): ?>
    <div class="container">
        <div class="container bg-light my-3 px-4 py-1 shadow" style=" border-radius: 12px;">
            <div class="container px-0">
                <p class="fw-bol mb-0 mt-2 pb-0 pt-1 d-flex align-items-center gap-2" style="color: #1b3c53; font-size: 0.9rem;">
                    <i class="bi bi-person-circle fs-3"></i>
                    <?php echo ucfirst($charity['name']); ?>
                </p>
                <p class="text-dark m-0 pt-0" style="font-size: 0.9rem;">
                    <?php echo ($charity['description']); ?>
                </p>
                <p class="m-0 pb-3" style="font-size: 0.8rem; color: #848484ff;">
                   <?php echo date('M j, Y g:i A', strtotime($charity['approved_datetime'])); ?>
                </p>
                <div class="progress" style="height: 13px;">
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
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                        <span class="fw-bold">₱ <?php echo number_format($charity['raised'], 2); ?></span> / ₱ <?php echo number_format($charity['fund_limit'], 2); ?>
                    </p>
                    <p class="m-0 fw-bold" style="font-size: 0.9rem; color: #1b3c53;">
                        <span id="charityCountdown<?php echo $charity['charity_id']; ?>"></span>
                    </p>
                </div>
                <div class="d-flex justify-content-end" style="border-top: 2px solid #9cabb6ff;">
                    <?php if(isset($_SESSION['user_id'])){ ?>
                        <button 
                            class="btn px-4 py-2 btn-donate text-decoration-none my-3 " 
                            style="border-radius: 10px; color: white; font-size: 0.9rem;  " 
                            data-bs-toggle="modal" 
                            data-bs-target="#donateModal"
                            data-charity-id="<?php echo $charity['charity_id']; ?>"
                            data-name="<?php echo ucfirst($charity['name']); ?>"
                            data-description="<?php echo $charity['description']; ?>"
                            data-approved-datetime="<?php echo $charity['approved_datetime']; ?>"
                            data-fund-limit="<?php echo $charity['fund_limit']; ?>"
                            data-raised="<?php echo $charity['raised']; ?>"
                            data-duration="<?php echo $charity['duration']; ?>"
                        >
                            Donate 
                        </button>
                    <?php } else { ?>
                        <a href="/Shanty-Dope-Proj/CareToFund/sign_in">
                            <button 
                                class="btn px-4 py-2 btn-donate text-decoration-none my-3 " 
                                style="border-radius: 10px; color: white; font-size: 0.9rem;" 
                            >
                                Login to Donate
                            </button>
                        </a>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
<script>
    startCountdown(
        "<?php echo $charity['approved_datetime']; ?>",
        "<?php echo $charity['duration']; ?>",
        "#charityCountdown<?= $charity['charity_id']; ?>",
        {
            onEnd: () => {
                document.querySelector("#charityCountdown<?= $charity['charity_id']; ?>").textContent = "Finished!";
            },
            action: () => {
                loadCharities();
                updateCharities();
            }
        }
    );
</script>
<?php endforeach; ?>