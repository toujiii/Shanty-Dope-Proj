<div class="container">
    <div class="container my-3 px-4 d-flex flex-column flex-md-row align-items-center justify-content-between text-center shadow" style="background: linear-gradient(to right, #456882,#456882, #c0bee5); min-height: 100px; border-radius: 12px;">
        <p class="text-white m-0 fs-4  my-md-0 my-4 fw-bold">
            What change do you want to make?
        </p>
        <button class="btn px-4 py-3 btn-signup text-decoration-none mb-md-0 mb-4"
            style="border-radius: 15px; color: white; font-size: 0.9rem;"
            <?php if ($verification == 'verified'): ?>
                data-bs-toggle="modal" data-bs-target="#createCharityModal"
            <?php else: ?>
                data-bs-toggle="modal" data-bs-target="#getVerificationModal"
            <?php endif; ?>
            >
            <i class="bi bi-piggy-bank-fill"></i> &nbsp;
            Create a Charity
        </button>
    </div>
</div>

<div class="modal fade" id="getVerificationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Setup-rafiki.svg" style="width: 150px;" alt="">
        <p class="fs-4 fw-bold m-0 " style="color: #456882;">
            Verification Required
        </p>
        <p class="m-0" style="font-size: 0.9rem;">
          Please verify your Identity first to create a charity.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
    </div>
  </div>
</div>