<div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
    <h2 class="fs-5 fw-bold m-0" style="color: #545454;">Charity Requests</h2>
    <div class="d-flex gap-3 ms-auto mt-2 mt-md-0 flex-column flex-sm-row">
        <div class="d-flex gap-2 " style="max-height: 30px;">
            <button 
                id="pendingRequestsBtn" 
                class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" 
                style="border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Pending')"
            >
                Pending
            </button>
            <button id="rejectedRequestsBtn" class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Rejected')"
            >
                Rejected
            </button>
            <button id="approvedRequestsBtn" class="btn btn-cool m-0 text-white px-3 d-flex align-items-center" style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;"
                onclick="handleFilterClick('Approved')"
            >
                Approved
            </button>
        </div>
        <input id="requestCharitySearch" type="text" class="form-control fs-6 m-0 py-0 px-2" placeholder="Search..." style="border-radius: 7px; border: 2px solid #1b3c53; padding-left: 15px; padding-right: 15px;">
    </div>
</div>

<div id="charityRequestsContainer"></div>
<div id="modalContainer"></div>
<?php include __DIR__ . '/admin_request_confirmation.php'; ?>
<?php include __DIR__ . '/admin_image_resize.php'; ?>
