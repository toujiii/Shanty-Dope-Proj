<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container d-flex justify-content-between align-items-center pb-2 p-0" style="border-bottom: 2px solid #1b3c53;">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-circle fs-5"></i>
          </button>
        </div>
        <div class="container px-0">
          <div class="container px-0">
            <p class="text-dark fs-6 m-0 pt-3 charity-description">
            </p>
            <p class="m-0 pb-3 charity-approved" style="font-size: 0.9rem; color: #848484ff;">

            </p>
            <div class="progress" style="height: 13px;">
              <div class="progress-bar progress-bar-striped progress-bar-animated"
                role="progressbar"
                aria-label="Charity Progress"
                style="width: 25%; background-color: #1b3c53;"
                aria-valuenow="25"
                aria-valuemin="0"
                aria-valuemax="100">
                25%
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mb-2">
              <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                <span class="fw-bold charity-raised">₱ 400.00</span> / <span class="charity-fund-limit">₱ 3,000.00</span>
              </p>
              <p class="m-0 fw-bold" style="font-size: 0.9rem; color: #1b3c53;">
                <span class="charity-duration"></span>
              </p>
            </div>
          </div>
          <form id="sendDonationForm" method="POST" enctype="multipart/form-data" class="container p-3" style="border-radius: 10px; background-color: #f6f6f6ff;">
            <div class="row mb-3">
              <!-- Donation Amount -->
              <div class="col-md-6">
                <label for="donation_amount" class="form-label">Donation Amount</label>
                <input type="number" class="form-control" id="donation_amount" name="amount" placeholder="Enter amount" required>
              </div>

              <!-- Payment Method -->
              <div class="col-md-6">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-select" id="payment_method" name="payment_method" required>
                  <option value="" disabled selected>Select Payment Method</option>
                  <option value="gcash">GCash</option>
                </select>
              </div>
            </div>

            <!-- Terms and Agreement -->
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="terms" required>
              <label class="form-check-label fs-6" for="terms">
                I confirm that I am willingly making this donation and consent to its processing, including the secure handling of my personal and payment information in accordance with the Privacy Policy.</a>
              </label>
            </div>

            <div class="d-flex justify-content-end">
              <button type="submit"
                class="btn px-4 py-2"
                style="background-color: #549f7b; color: #ffffffff; font-weight: bold; border-radius: 8px;"
                data-bs-dismiss="modal" 
                >
                Donate Now
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="thankYouModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-piggy-bank-fill" style="font-size: 100px; color: #549f7b;"></i>
        <p class="fs-4 fw-bold m-0">
          Success!
        </p>
        <p class="m-0">
          The have donated to John Doe's Charity.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>

  <!-- <div class="modal fade" id="thankYouModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
          <i class="bi bi-piggy-bank-fill" style="font-size: 100px;;"></i>
          <p class="fs-4 fw-bold m-0 text-success">
            Thank You!
          </p>
          <p class="m-0">
            Your donation has been received successfully.
          </p>
        </div>
        <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
          <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
        </div>
      </div>
    </div>
  </div> -->


  <script>
    $('#donateModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget); 
      var charityId = button.data('charity-id'); 
      var name = button.data('name'); 
      var description = button.data('description'); 
      var approvedDatetime = button.data('approved-datetime'); 
      var fundLimit = button.data('fund-limit'); 
      var raised = button.data('raised'); 
      var duration = button.data('duration'); 

      $('.modal-title').text('Donate to ' + name);
      $('.charity-description').text(description);
      $('.charity-fund-limit').text('₱ ' + fundLimit.toFixed(2));
      $('.charity-raised').text('₱ ' + raised.toFixed(2));
      $('.charity-approved').text(approvedDatetime);
      $('.charity-duration').attr('id', 'charity-duration-' + charityId);


      startCountdown(
          approvedDatetime,
          duration,
          "#charity-duration-" + charityId,
          {
              onEnd: () => {
                  document.querySelector("#charity-duration-" + charityId).textContent = "Finished!";
                  // location.reload(); 
              },
              action: () => {
                  loadCharities();
                  updateCharities();
                  var donateModal = bootstrap.Modal.getInstance(
                    document.getElementById("donateModal")
                  );
                  if (donateModal) donateModal.hide();
              }
          }
      );
      // Store the requestId somewhere, e.g., in a hidden input or a JS variable
      $(this).data('charity-id', charityId);
    });
  </script>


  