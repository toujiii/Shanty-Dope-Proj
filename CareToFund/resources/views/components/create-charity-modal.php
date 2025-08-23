<style>
.modal-step-indicator {
    font-family: 'Ubuntu', sans-serif;
    margin-bottom: 10px;
}
.step-indicator {
    display: inline-block;
    margin: 0 15px;
    font-size: 1rem;
    font-weight: 500;
    color: #456882;
    position: relative;
    pointer-events: none;
}
.step-indicator.active {
    color: #1B3C53;
    font-weight: 700;
}
.step-indicator.active::after {
    content: "";
    display: block;
    width: 50%;
    height: 3px;
    background-color: #1B3C53;
    margin: 5px auto 0;
    border-radius: 2px;
}

.modal-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: none;
}

.custom-input {
    border: 1px solid #ddd;        /* Soft border */
    border-radius: 8px;           /* Smooth rounded edges */
    background-color: #f8f9fa;    /* Light gray background */
    color: #495057;               /* Muted text color */
    padding: 12px;
    transition: all 0.3s ease;
}

.custom-input:focus {
    border-color: #1B3C53;        /* Accent color on focus */
    background-color: #ffffff;    /* White background when active */
    box-shadow: 0 0 8px rgba(27, 60, 83, 0.2); /* Soft glow */
}

.upload-box {
    width: 100%;
    height: 180px;
    border: 2px dashed #ccc;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #777;
    font-size: 14px;
    cursor: pointer;
    transition: border-color 0.3s, color 0.3s;
    background-color: #f8f9fa;
    text-align: center;
    margin-bottom: 10px;
}

.upload-box:hover {
    border-color: #1B3C53;
    color: #1B3C53;
}

.upload-box i {
    font-size: 2rem;
    margin-bottom: 8px;
}
</style>

<div class="modal fade" id="createCharityModal" tabindex="-1" aria-labelledby="createCharityLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
            <h5 class="modal-title">Create a New Charity</h5>
            <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x-circle"></i>
            </button>
        </div>


      <div class="modal-step-indicator text-center py-2 relative">
        <div class="mx-auto mb-2" style="height: 4px; background-color: #1B3C53; width: 95%; border-radius: 2px;"></div>
        <span class="step-indicator active" data-step="1">Charity Details</span>
        <span class="step-indicator" data-step="2">Verification</span>
        </div>



      <form action="process_create_charity.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- Step 1: Charity Details -->
          <div class="step step-1">
            <textarea class="form-control custom-input mb-3"
                    name="description" rows="3" 
                    placeholder="What is your charity all about?" required></textarea>

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="number" class="form-control custom-input"
                        name="fund_limit" placeholder="Charity Fund limit..." required>
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control custom-input"
                        name="duration" placeholder="Charity Event duration..." required>
                </div>
            </div>
        </div>

          <!-- Step 2: Verification -->
          <div class="step step-2 d-none">
                <div class="mb-3">
                    <label for="id_type" class="form-label">ID Verification</label>
                    <select class="form-select" id="id_type" name="id_type" required>
                        <option value="">Select ID Type</option>
                        <option value="passport">Passport</option>
                        <option value="drivers_license">Driver's License</option>
                        <option value="national_id">National ID</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload ID Image</label>
                    <label for="id_upload" class="upload-box">
                        <i class="bi bi-plus-circle"></i>
                        Click to upload ID image
                    </label>
                    <input type="file" class="d-none" id="id_upload" name="id_upload" accept="image/*" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Face Verification</label>

                    <label for="face_front" class="upload-box">
                        <i class="bi bi-plus-circle"></i>
                        Click to upload front face image
                    </label>
                    <input type="file" class="d-none" id="face_front" name="face_front" accept="image/*" required>

                    <label for="face_side" class="upload-box">
                        <i class="bi bi-plus-circle"></i>
                        Click to upload side face image
                    </label>
                    <input type="file" class="d-none" id="face_side" name="face_side" accept="image/*" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
          <button type="button" 
            class="btn px-4 py-2 btn-signup prev-btn d-none text-decoration-none mb-md-0 mb-4" 
            style="border-radius: 15px; color: white; font-size: 0.9rem;">
            Previous
        </button>

        <button type="button" 
            class="btn px-4 py-2 btn-signup next-btn text-decoration-none mb-md-0 mb-4" 
            style="border-radius: 15px; color: white; font-size: 0.9rem;">
            Next
        </button>

        <button type="submit" 
            class="btn px-4 py-2 btn-signup submit-btn d-none text-decoration-none mb-md-0 mb-4" 
            style="border-radius: 15px; color: white; font-size: 0.9rem;">
            Submit Charity
        </button>


        </div>
      </form>

    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("createCharityModal");
  if (!modal) return;

  const steps       = modal.querySelectorAll(".step");
  const nextBtn     = modal.querySelector(".next-btn");
  const prevBtn     = modal.querySelector(".prev-btn");
  const submitBtn   = modal.querySelector(".submit-btn");
  const indicators  = modal.querySelectorAll(".step-indicator");

  let currentStep = 1;

  function showStep(n) {
    if (n < 1) n = 1;
    if (n > steps.length) n = steps.length;
    currentStep = n;

    steps.forEach((s, i) => s.classList.toggle("d-none", i !== currentStep - 1));

    prevBtn.classList.toggle("d-none", currentStep === 1);
    nextBtn.classList.toggle("d-none", currentStep === steps.length);
    submitBtn.classList.toggle("d-none", currentStep !== steps.length);

    indicators.forEach((el, i) => el.classList.toggle("active", i === currentStep - 1));
  }

  nextBtn?.addEventListener("click", () => showStep(currentStep + 1));
  prevBtn?.addEventListener("click", () => showStep(currentStep - 1));

  indicators.forEach(el => {
    el.addEventListener("click", () => {
      const target = parseInt(el.getAttribute("data-step"), 10);
      if (!isNaN(target)) showStep(target);
    });
  });

  modal.addEventListener("shown.bs.modal", () => showStep(1));
  modal.addEventListener("hidden.bs.modal", () => showStep(1));

  showStep(1);
});
</script>


