<!-- Modal -->
<div class="modal fade" id="admin_request_confirmation" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Questions-pana.svg" style="width: 150px;" alt="">
        <p class="fs-4 fw-bold m-0 confirm-head">
        </p>
        <p class="fs-6  m-0 confirm-description" >
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Cancel</button>
        <button type="button" class="btn btn-confirm fw-bold" data-bs-toggle="modal" data-bs-target="#admin_request_confirmed"
        >

        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_request_confirmed" tabindex="-1"  aria-hidden="true">
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
  $('#admin_request_confirmation').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var requestId = button.data('request-id'); // Extract info from data-* attributes
      var userId = button.data('user-id');
      var confirmation = button.data('confirmation');
      console.log(confirmation);
      if(confirmation === "approve") {
          $('.confirm-head').text('Approve Charity');
          $('.confirm-description').text('Are you sure you want to approve this charity request?');
          var $confirmBtn = $('#admin_request_confirmation .btn-confirm');
          $confirmBtn
              .addClass('btn-green').removeClass('btn-red')
              .text('Approve')
              .off('click')
              .on('click', function() {
                  charityRequestConfirmation(requestId, userId, confirmation);
              });
      } else if(confirmation === "reject") {
          $('.confirm-head').text('Reject Charity');
          $('.confirm-description').text('Are you sure you want to reject this charity request?');
          var $confirmBtn = $('#admin_request_confirmation .btn-confirm');
          $confirmBtn
              .addClass('btn-red').removeClass('btn-green')
              .text('Reject')
              .off('click')
              .on('click', function() {
                  charityRequestConfirmation(requestId, userId, confirmation);
              });
      }

  });
</script>