<!-- Modal -->
<div class="modal fade" id="cancelCharityModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Thinking face-cuate.svg" style="width: 200px;" alt="">
        <p class="fs-5 fw-bold m-0">
          Are you sure you want to cancel this charity request?
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Cancel</button>
        <button type="button" class="btn btn-red text-white btn-cancel fw-bold" data-bs-toggle="modal" data-bs-target="#cancelCharityOK">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cancelCharityOK" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-check-circle" style="font-size: 100px; color: #549f7b;"></i>
        <p class="fs-5 fw-bold m-0">
          Charity Cancelled!
        </p>
        <p class="m-0">
          The charity request has been Cancelled.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#cancelCharityModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var charityId = button.data('charity-id'); // Extract info from data-* attributes
        var userId = button.data('user-id');
        console.log(charityId, userId);
        

        var $confirmBtn = $('#cancelCharityModal .btn-cancel');
        $confirmBtn
          .on('click', function() {
            cancelCharity(charityId, userId);
          });
  });
</script>