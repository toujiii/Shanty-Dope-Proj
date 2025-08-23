<div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Donate to Shanty</h5>
        <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="bi bi-x-circle"></i>
        </button>
      </div>

      <div class="modal-step-indicator text-center py-2 relative m-0">
        <div class="mx-auto mb-0" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>
      </div>

      <div class="container bg-light mb-3 px-4 py-2 shadow" style=" border-radius: 12px;">
        <div class="container">
            <p class="text-dark fs-6 m-0">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <p class="m-0 pb-3" style="font-size: 0.9rem; color: #848484ff;">
                3:10 PM Jan 15, 2025
            </p>
            <div class="progress">
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
            <div class="d-flex align-items-center justify-content-between">
                <p class=" mt-2 mb-2" style="font-size: 0.9rem; color: #1b3c53;">
                    <span class="fw-bold">₱ 400.00</span> / ₱ 3,000.00
                </p>
                <p class="m-0 fw-bold" style="font-size: 0.9rem; color: #1b3c53;">
                    5 Days Left...
                </p>
            </div>
    </div>

      <div class="modal-body p-4">
  <form>
    <div class="row mb-3">
      <!-- Donation Amount -->
      <div class="col-md-6">
        <label for="donation_amount" class="form-label">Donation Amount</label>
        <input type="number" class="form-control" id="donation_amount" name="donation_amount" placeholder="Enter amount" required>
      </div>

      <!-- Payment Method -->
      <div class="col-md-6">
        <label for="payment_method" class="form-label">Payment Method</label>
        <select class="form-select" id="payment_method" name="payment_method" required>
          <option value="" disabled selected>Select Payment Method</option>
          <option value="gcash">GCash</option>
          <option value="paypal">PayPal</option>
          <option value="bank">Bank Transfer</option>
        </select>
      </div>
    </div>

    <!-- Terms and Agreement -->
    <div class="form-check mb-3">
      <input class="form-check-input" type="checkbox" id="terms" required>
      <label class="form-check-label" for="terms">
        I confirm that I am willingly making this donation and consent to its processing, including the secure handling of my personal and payment information in accordance with the Privacy Policy.</a>
      </label>
    </div>

    <!-- Donate Button (Yellow, Lower Right) -->
    <div class="d-flex justify-content-end">
      <button type="submit" class="btn px-4 py-2" style="background-color: #549f7b; color: #ffffffff; font-weight: bold; border-radius: 8px;">
        Donate Now
      </button>
    </div>
  </form>
</div>

    </div>
  </div>
</div>
