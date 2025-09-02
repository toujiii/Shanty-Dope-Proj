
<div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
    <h2 class="fs-5 fw-bold m-0" style="color: #545454;">Charity Campaign</h2>
    <div class="d-flex gap-3 ms-auto mt-2 mt-md-0 flex-column flex-sm-row">
        <div class="d-flex gap-2 " style="max-height: 30px;">
            <button 
                id="ongoingCharityBtn" 
                class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" 
                style="border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Ongoing')"
            >
                Ongoing
            </button>
            <button 
                id="finishedCharityBtn" 
                class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" 
                style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Finished')"
            >
                Finished
            </button>
            <button 
                id="cancelledCharityBtn" 
                class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" 
                style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Cancelled')"
            >
                Cancelled
            </button>
        </div>
        <input id="charitySearch" type="text" class="form-control fs-6 m-0 py-0 px-2" placeholder="Search..." style="border-radius: 7px; border: 2px solid #1b3c53; padding-left: 15px; padding-right: 15px;">
    </div>
</div>

<div id="charitiesContainer"></div>

<?php include __DIR__ . '/admin_abort_charity_modal.php'; ?>
<?php include __DIR__ . '/admin_charity_donators_modal.php'; ?>

