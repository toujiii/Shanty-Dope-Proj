<!-- Modal -->
<div class="modal fade" id="admin_request_rejection" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-question-circle" style="font-size: 100px; color: #1b3c53;"></i>
        <p class="fs-5 fw-bold m-0" >
            Are you sure you want to reject this charity request?
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Cancel</button>
        <button type="button" class="btn btn-danger  fw-bold" data-bs-toggle="modal" data-bs-target="#admin_request_rejected"
        onclick="charityRejectionRequest()">Reject</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_request_rejected" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-check-circle" style="font-size: 100px; color: #ffbd59;"></i>
        <p class="fs-5 fw-bold m-0" >
            Rejected!
        </p>
        <p class="m-0">
          The charity request has been Rejected.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
  $('#admin_request_rejection').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var requestId = button.data('request-id'); // Extract info from data-* attributes
      var userId = button.data('user-id');
      // console.log(requestId);

      // Store the requestId somewhere, e.g., in a hidden input or a JS variable
      $(this).data('request-id', requestId);
      $(this).data('user-id', userId);
  });
</script>