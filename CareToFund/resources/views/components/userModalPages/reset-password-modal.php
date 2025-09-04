<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content px-3 py-2 rounded-3 shadow-sm">

      <div class="modal-header px-2 py-2">
        <h5 class="modal-title">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="Shanty-Dope-Proj/CareToFund/updateUserPassword" method="POST" id="editPasswordForm">
        <div class="bg-light p-3 rounded-3 mb-3" style="border: 2px solid #c5c5c5ff;">
          <div class="modal-body p-0">
            <div class="mb-3">
              <label for="current_password" class="form-label">Current Password</label>
              <input type="password" name="current_password" id="currentPassword" class="form-control" required minlength="6">
            </div>
            <div class="mb-3">
              <label for="new_password" class="form-label">New Password</label>
              <input type="password" name="new_password" id="newPassword" class="form-control" required minlength="6">
            </div>
            <div class="mb-3">
              <label for="confirm_password" class="form-label">Confirm Password</label>
              <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required minlength="6">
            </div>
          </div>
        </div>
        

        <div class="modal-footer p-0" style="border-top: none;">
          <button type="button" class="btn btn-secondary" style="font-size: 0.9rem; border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#profileModal">Back</button>
          <button type="submit" class="btn btn-yellow text-white" style="font-size: 0.9rem; border-radius: 8px;">Update Password</button>
        </div>
      </form>

    </div>
  </div>
</div>