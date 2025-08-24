<div class="modal fade" id="abortCharityModal" tabindex="-1" aria-labelledby="abortCharityModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
            <h5 class="modal-title">Abort Charity</h5>
            <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>
        <div class="mx-auto mb-2" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>

      <div class="modal-body">
        Are you sure you want to abort this charity? This action cannot be undone.
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="abort_charity.php" method="POST">
          <button type="submit" class="btn btn-danger">Confirm Abort</button>
        </form>
      </div>

    </div>
  </div>
</div>
