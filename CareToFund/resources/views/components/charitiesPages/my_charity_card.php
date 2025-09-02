<?php
    if(isset($_SESSION['user_id']) ){
?>
            <div class="container" id="myCharityCard">
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow-sm" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882); ; border-radius: 12px;">
                    <div class="container">
                        <p class="text-white fs-5 fw-bold mb-2 mt-3">
                            My Charity
                            <a data-bs-toggle="collapse" href="#charityDesc1" role="button" aria-expanded="false" aria-controls="charityDesc1" class="ms-0 text-white" style="cursor:pointer;">
                                <i id="charityToggle1" class="bi bi-caret-down-fill fs-5"></i>
                            </a>
                        </p>
                        <div class="collapse" id="charityDesc1">
                            <p class="text-white fs-6 mb-0"><?php echo $charityDetails[0]['description']; ?></p>
                            <p class="m-0 mb-2 text-white" style="font-size: 0.9rem;"> <?php echo date('M j, Y g:i a', strtotime($charityDetails[0]['datetime'])); ?></p>
                        </div>

                        <div class="progress" style="height: 13px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                role="progressbar"
                                aria-label="Charity Progress"
                                style="width: <?php echo ($charityDetails[0]['raised'] / $charityDetails[0]['fund_limit']) * 100; ?>%; background-color: #1b3c53;"
                                aria-valuenow="<?php echo ($charityDetails[0]['raised'] / $charityDetails[0]['fund_limit']) * 100; ?>"
                                aria-valuemin="0"
                                aria-valuemax="100">
                                <?php echo round(($charityDetails[0]['raised'] / $charityDetails[0] ['fund_limit']) * 100, 2); ?>%
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                                <span  class="fw-bold">₱ <?php echo number_format($charityDetails[0]['raised'], 2); ?></span> / <span>₱ <?php echo number_format($charityDetails[0]['fund_limit'], 2); ?></span>
                            </p>
                            <p id="myCharityDuration" class="m-0 text-white fw-bold" style="font-size: 0.9rem;">
                            </p>
                        </div>
                        
                        <button class="btn btn-transparent text-white  mb-3 p-0 d-flex align-items-center gap-2"
                                onclick="loadDonators(<?php echo $charityDetails[0]['charity_id']; ?>)"
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const desc = document.getElementById('charityDesc1');
    const toggle = document.getElementById('charityToggle1');
    if (desc && toggle) {
        desc.addEventListener('shown.bs.collapse', () => toggle.classList.replace('bi-caret-down-fill', 'bi-caret-up-fill'));
        desc.addEventListener('hidden.bs.collapse', () => toggle.classList.replace('bi-caret-up-fill', 'bi-caret-down-fill'));
    }
});
startCountdown(
    "<?php echo $charityDetails[0]['approved_datetime']; ?>",
    "<?php echo $charityDetails[0]['duration']; ?>",
    "#myCharityDuration",
    {
    onEnd: () => {
        document.querySelector("#myCharityDuration").textContent =
        "Finished!";
    },
    action: () => {
        updateCharities();
        fetchUserStatus();
    }
});
</script>

