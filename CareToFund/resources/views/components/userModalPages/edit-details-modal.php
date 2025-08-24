<div class="modal fade" id="editDetailsModal" tabindex="-1" aria-labelledby="editDetailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header">
            <h5 class="modal-title">Edit Details</h5>
            <button type="button" class="btn p-0 border-0 bg-transparent close-btn ms-auto" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>
        <div class="mx-auto mb-2" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>
      <div class="modal-body">
        <form id="editDetailsForm">
          <!-- Name -->
          <div class="mb-3">
            <label for="editName" class="fw-semibold text-dark">Name</label>
            <input type="text" class="form-control" id="editName" value="John Doe" required>
          </div>
          <!-- Email -->
          <div class="mb-3">
            <label for="editEmail" class="fw-semibold text-dark">Email</label>
            <input type="email" class="form-control" id="editEmail" value="johndoe@email.com" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn px-3 py-2" 
                  style="background-color: #1B3C53; color: #fff; font-weight: bold; border-radius: 8px;">
            Save Changes
          </button>
      </div>
    </div>
  </div>
</div>
