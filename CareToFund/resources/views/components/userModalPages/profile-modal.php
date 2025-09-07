<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content px-3 pb-3 rounded-3 shadow-sm" style="border: none;">
      <div class="modal-header px-2 py-2">
        <h5 class="modal-title">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="d-flex flex-column align-items-center m-0 mb-2 bg-light p-3 rounded-3" style="border: 2px solid #c5c5c5ff;">
          <div class="d-flex flex-column align-items-center gap-1 w-100">
            <img src="/Shanty-Dope-Proj/CareToFund/resources/img/user-profile.png" style="width: 80px;" alt="">
            <div class="d-flex flex-column align-items-center">
              <?php
              if (isset($userDetails[0]['user_front_link']) && isset($userDetails[0]['user_side_link'])) {
              ?>
                <p class="badge bg-success text-light m-0"
                  style="font-weight: normal; font-size: 0.8rem;">
                  Verified
                </p>
              <?php
              } else {
              ?>
                <p class="badge bg-warning text-light m-0"
                  style="font-weight: normal; font-size: 0.8rem;">
                  Unverified
                </p>
              <?php
              }
              ?>
              <span class="fw-semibold text-dark fs-4"><?php echo ucfirst($userDetails[0]['name'] ?? 'N/A'); ?></span>
              <span class=" text-secondary"><?php echo htmlspecialchars($userDetails[0]['email'] ?? 'N/A'); ?></span>
              

            </div>
          </div>
          <div class="d-flex flex-column flex-sm-row justify-content-center gap-2 mt-3 align-items-center w-100">
            <button type="button" class="btn p-0 btn-transparent text-center"
              style=" border-radius: 8px;  font-size: 0.9rem; height: fit-content; color: #1B3C53;"
              data-bs-toggle="modal" data-bs-target="#editDetailsModal">
              Edit
            </button>
            <span class=" d-none d-sm-block" style="color: #1B3C53;">|</span>
            <button type="button" class="btn p-0 btn-transparent"
              style=" border-radius: 8px;  font-size: 0.9rem; height: fit-content; color: #1B3C53;"
              data-bs-toggle="modal"
              data-bs-target="#resetPasswordModal">
              Password
            </button>
            <span class=" d-none d-sm-block" style="color: #1B3C53;">|</span>
            <button type="button" class="btn p-0 btn-transparent"
              style=" border-radius: 8px;  font-size: 0.9rem; height: fit-content; color: #1B3C53;"
              data-bs-toggle="modal"
              data-bs-target="#editImagesModal">
              Verify
            </button>
          </div>

        </div>

        <h5 class="ms-2">Wallets</h5>
        <div class="d-flex flex-column gap-1 mb-3 p-3 rounded-3 bg-light" style="border: 2px solid #c5c5c5ff;">
          <p class=" mb-1">Gcash</p>
          <div class="d-flex align-items-center gap-2">
            <input type="text" class="form-control" value="<?php echo htmlspecialchars($userDetails[0]['gcash_number'] ?? 'N/A'); ?>" disabled>
            <i class="bi bi-check-circle text-success fs-5"></i>
          </div>
        </div>


        <div class="text-end">
          <form action="/Shanty-Dope-Proj/CareToFund/signOut" method="POST">
            <button type="submit" class="btn px-4 py-2 btn-red text-white"
              style=" border-radius: 8px; font-size: 0.9rem;">
              <i class="bi bi-box-arrow-left me-1"></i>
              <span>Sign Out</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>