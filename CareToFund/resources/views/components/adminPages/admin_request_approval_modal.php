<!-- Modal -->
<div class="modal fade" id="admin_request_approval" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Questions-pana.svg" style="width: 150px;" alt="">
        <p class="fs-4 fw-bold m-0">
          Approve Charity
        </p>
        <p class="fs-6  m-0" >
            Are you sure you want to approve this charity request?
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Cancel</button>
        <button type="button" class="btn btn-success  fw-bold" data-bs-toggle="modal" data-bs-target="#admin_request_approved"
        onclick="charityApprovalRequest()">Approve</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_request_approved" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        
        <p class="fs-4 fw-bold m-0" >
            Approved!
        </p>
        <p class="m-0">
          The charity request has been approved.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#admin_request_approval').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var requestId = button.data('request-id'); // Extract info from data-* attributes
      var userId = button.data('user-id');
      // console.log(requestId);

      // Store the requestId somewhere, e.g., in a hidden input or a JS variable
      $(this).data('request-id', requestId);
      $(this).data('user-id', userId);
  });
</script>