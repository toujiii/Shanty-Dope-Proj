<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-3 shadow-sm" style="border: none;">
      
       <div class="modal-header">
            <h5 class="modal-title">Profile</h5>
            <button type="button" class="btn p-0 border-0 bg-transparent close-btn ms-auto" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>

        <div class="mx-auto mb-2" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>
        
      <!-- Body -->
      <div class="modal-body">
        <!-- Profile Fields -->
        <!-- Display Fields (No Edit Icons) -->
        <div class="mb-3">
          <span class="fw-semibold text-dark">Name: <?php echo htmlspecialchars($userDetails[0]['name'] ?? 'N/A'); ?></span>
        </div>

        <div class="mb-3">
          <span class="fw-semibold text-dark">Email: <?php echo htmlspecialchars($userDetails[0]['email'] ?? 'N/A'); ?></span>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-end gap-2 mb-4">
          <button type="button" class="btn px-3 py-2" 
                  style="background-color: #1B3C53; color: #fff; font-weight: bold; border-radius: 8px;"
                  data-bs-toggle="modal" data-bs-target="#editDetailsModal">
            Edit Details
          </button>

          <button class="btn btn-warning px-3 py-2" 
                    style="background-color: #ff9d5cff; color: #fff; font-weight: bold; border-radius: 8px;"
                    data-bs-toggle="modal" 
                    data-bs-target="#resetPasswordModal">
                Reset Password
            </button>
        </div>


        <!-- Wallets -->
        <h6 class="fw-bold">Wallets</h6>
          <p class="fw-bold">Gcash: <?php echo htmlspecialchars($userDetails[0]['gcash_number'] ?? 'N/A'); ?></p>

          <div class="mx-auto mb-2" 
              style="height: 4px; background-color: #1B3C53; width: 100%; border-radius: 2px;">
          </div>

          <!-- Sign Out -->
          <div class="text-end">
            <form action="/Shanty-Dope-Proj/CareToFund/signOut" method="POST">
              <button type="submit" class="btn px-4 py-2" 
                      style="background-color: #ff0000ff; color: #ffffffff; font-weight: bold; border-radius: 8px;">
                Sign Out
              </button>
            </form>
          </div>
      </div>
    </div>
  </div>
</div>
