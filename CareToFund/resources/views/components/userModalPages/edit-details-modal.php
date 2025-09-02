<div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content px-3 py-2 rounded-3 shadow-sm">
      <div class="modal-header px-2 py-2">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <form id="editDetailsForm" method="POST" action="/Shanty-Dope-Proj/CareToFund/updateUser">
          <div class="bg-light p-3 rounded-3 mb-3">
            <div class="mb-3">
              <label for="editName" class="form-label text-dark">Name</label>
              <input type="text" class="form-control" id="editName" name="name"
                value="<?php echo htmlspecialchars($userDetails[0]['name'] ?? ''); ?>" required>
            </div>
            <!-- Email -->
            <div class="mb-3">
              <label for="editEmail" class="form-label text-dark">Email</label>
              <input type="email" class="form-control" id="editEmail" name="email"
                value="<?php echo htmlspecialchars($userDetails[0]['email'] ?? ''); ?>" required>
            </div>
          </div>
          
          <div class="modal-footer p-0 " style="border-top: none;">
            <button type="button" class="btn m-0 p-2 btn-secondary" style="border-radius: 8px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#profileModal">Back</button>
            <button type="submit" class="btn px-4 py-2 btn-cool text-white"
              style=" border-radius: 8px; font-size: 0.9rem;">
              Save Changes
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>