<!-- Modal -->
<div class="modal fade" id="admin_user_edit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content px-3 pb-3 rounded-3 shadow-sm" style="border: none;">
      <div class="modal-header px-2 py-3" style="border-bottom: none;">
        <h5 class="modal-title fs-5">Edit User <?php echo htmlspecialchars($user['name']); ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <form id="editUserForm">
          <div class="bg-light p-3 rounded-3">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="hidden" id="edit_user_id" name="user_id" value="<?php echo htmlspecialchars($user['id']); ?>">
              <input type="text" class="form-control" id="name" name="name" required value="<?php echo htmlspecialchars($user['name']); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required value="<?php echo htmlspecialchars($user['email']); ?>">
            </div>
            <div class="mb-3">
              <label class="form-label">GCash</label>
              <input type="text" class="form-control" id="gcash" name="gcash" disabled value="<?php echo htmlspecialchars($user['gcash_number']); ?>">
            </div>
            <div class="">
              <label class="form-label">Password</label>
              <input type="text" class="form-control" id="password" name="password" disabled value="<?php echo htmlspecialchars(substr($user['password'], 0, 10)) . '...'; ?>">
            </div>
          </div>
          <div class="d-flex justify-content-end align-items-center gap-2 mt-3">
            <button type="button" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn btn-green text-white">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_user_edited" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header " style="border-bottom: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Ok-amico.svg" style="width: 150px;" alt="">
        <p class="fs-5 fw-bold m-0 2nd-modal-head" >
            User Updated!
        </p>
        <p class="m-0 2nd-modal-description">
          The user has been successfully updated.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary text-white">Close</button>
      </div>
    </div>
  </div>
</div>