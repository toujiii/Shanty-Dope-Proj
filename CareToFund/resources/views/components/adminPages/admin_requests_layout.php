<div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
    <h2 class="fs-4 fw-bold m-0" style="color: #545454;">Charity Requests</h2>
    <div class="d-flex gap-3 ms-auto mt-2 mt-md-0 flex-column flex-sm-row">
        <div class="d-flex gap-2 ">
            <button class="btn btn-warning m-0 text-white px-3" style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;">
            Pending
            </button>
            <button class="btn btn-danger m-0 text-white px-3" style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;">
                Rejected
            </button>
            <button class="btn btn-success m-0 text-white px-3 " style=" border-radius: 15px; width: fit-content; font-size: 0.9rem;">
                Approved
            </button>
        </div>
        <input type="text" class="form-control fs-6 m-0 p-1 px-2" placeholder="Search..." style="border-radius: 12px; border: 3px solid #1b3c53; padding-left: 15px; padding-right: 15px;">
    </div>
</div>

<div class="" id="charityRequestsContainer"></div>

<?php include __DIR__ . '/admin_request_approval_modal.php'; ?>
<?php include __DIR__ . '/admin_request_rejection_modal.php'; ?>
<?php include __DIR__ . '/admin_attachments_modal.php'; ?>