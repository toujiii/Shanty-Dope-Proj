<!-- Modal -->
<div class="modal fade" id="admin_user_delete" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Questions-pana.svg" style="width: 200px;" alt="">
        <p class="fs-5 fw-bold m-0" >
            Are you sure you want to delete this user?
        </p>
        <input type="hidden" id="delete_user_id">
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-2 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary ">Cancel</button>
        <button type="button" class="btn btn-red " id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="admin_user_deleted" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom: none;">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Inbox cleanup-rafiki.svg" style="width: 200px;" alt="">
        <p class="fs-5 fw-bold m-0" >
            User Deleted!
        </p>
        <p class="m-0">
          The user has been successfully deleted.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary ">Close</button>
      </div>
    </div>
  </div>
</div>