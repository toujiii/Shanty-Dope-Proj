<!-- Modal -->
<div class="modal fade" id="admin_user_edit" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body ">
        <form action="">
            <div class="d-flex justify-content-between align-items-center p-2 px-0" style="border-bottom: 4px solid #1b3c53;">
            <h5 class="modal-title fw-bold" id="exampleModalLabel" style="color: #1b3c53;">Update User (1001)</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="my-3">
                <label for="id_number" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required value="John Doe">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="johndoe@email.com">
            </div>
            <div class="mb-3">
                <label for="id_number" class="form-label">GCash:</label>
                <input type="text" class="form-control" id="gcash" name="gcash" disabled value="09123456789">
            </div>
            <div class="mb-3">
                <label for="id_number" class="form-label">Password:</label>
                <input type="text" class="form-control" id="password" name="password" disabled value="?SaNASJKDNBS DOI@#@09">
            </div>
            
            <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Cancel</button>
                <button type="button" class="btn btn-success  fw-bold" data-bs-toggle="modal" data-bs-target="#admin_user_edited">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_user_edited" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-check-circle" style="font-size: 100px; color: #549f7b;"></i>
        <p class="fs-5 fw-bold m-0" >
            User Updated!
        </p>
        <p class="m-0">
          The user has been successfully updated.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>