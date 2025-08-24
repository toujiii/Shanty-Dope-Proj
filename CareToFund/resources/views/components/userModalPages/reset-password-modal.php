<div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
            <h5 class="modal-title">Reset Password</h5>
            <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>

        <div class="mx-auto mb-2" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>

      <form action="process_reset_password.php" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required minlength="6">
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm_password" class="form-control" required minlength="6">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning">Update Password</button>
        </div>
      </form>

    </div>
  </div>
</div>
