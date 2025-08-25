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
  <div class="modal-dialog modal-lg modal-dialog-centered">
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



      <form id="createCharityForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- Step 1: Charity Details -->
          <div class="step step-1">
            <textarea class="form-control custom-input mb-3"
                    name="description" rows="3" 
                    placeholder="What is your charity all about?" required></textarea>

            <div class="row g-3">
                <div class="col-md-6">
                    <input type="number" class="form-control custom-input"
                        name="fund_limit" placeholder="Charity Fund limit..." required min="100" max="100000" step="1">
                </div>
                <div class="col-md-6">
                    <input type="number" class="form-control custom-input"
                        name="duration" placeholder="Charity Event duration..." required min="1" max="31" step="1">
                </div>
            </div>
        </div>

          <!-- Step 2: Verification -->
          <div class="step step-2 d-none">
                <div class="mb-3">
                    <label for="id_type" class="form-label">ID Verification</label>
                    <select class="form-select" id="id_type" name="id_type" required>
                        <option value="">Select ID Type</option>
                        <option value="Passport">Passport</option>
                        <option value="Driver's License">Driver's License</option>
                        <option value="National ID">National ID</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="id_number" class="form-label">ID Number</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">ID Upload</label>
                    <label for="id_upload" class="upload-box" id="id_upload_box">
                        <i class="bi bi-plus-circle"></i>
                        <span>Click to upload ID image</span>
                        <img id="id_upload_preview" src="" alt="ID Preview" style="display:none; max-height:175px;" />
                    </label>
                    <input type="file" class="d-none" id="id_upload" name="id_upload" accept="image/*" capture="environment" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Face Front</label>
                    <label for="face_front" class="upload-box" id="face_front_box">
                        <i class="bi bi-plus-circle"></i>
                        <span>Click to upload front face image</span>
                        <img id="face_front_preview" src="" alt="Front Face Preview" style="display:none; max-height:175px;" />
                    </label>
                    <input type="file" class="d-none" id="face_front" name="face_front" accept="image/*" required>
                    <label for="face_front" class="form-label">Face Side</label>
                    <label for="face_side" class="upload-box" id="face_side_box">
                        <i class="bi bi-plus-circle"></i>
                        <span>Click to upload side face image</span>
                        <img id="face_side_preview" src="" alt="Side Face Preview" style="display:none; max-height:175px;" />
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
            style="border-radius: 15px; color: white; font-size: 0.9rem;"
            disabled
            >
            Next
        </button>

        <button type="submit" 
            class="btn px-4 py-2 btn-signup submit-btn d-none text-decoration-none mb-md-0 mb-4" 
            style="border-radius: 15px; color: white; font-size: 0.9rem;"
            >
            Submit Charity
        </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="charity_created" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
        <i class="bi bi-piggy-bank-fill" style="font-size: 100px;;"></i>
        <p class="fs-4 fw-bold m-0 text-success" >
            Success!
        </p>
        <p class="m-0">
          The charity request has been created successfully.
        </p>
      </div>
      <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
        <button type="button" data-bs-dismiss="modal" class="btn btn-secondary  fw-bold">Close</button>
      </div>
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

  function checkStep1Fields() {
  const step1 = document.querySelector('.step-1');
  const required = step1.querySelectorAll('[required]');
  let allValid = true;

  required.forEach(input => {
    // Check for empty value
    if (input.value.trim() === "") {
      allValid = false;
      return;
    }
    // If number input, check min/max
    if (input.type === "number") {
      const val = Number(input.value);
      const min = input.min !== "" ? Number(input.min) : -Infinity;
      const max = input.max !== "" ? Number(input.max) : Infinity;
      if (val < min || val > max) {
        allValid = false;
      }
    }
  });

  nextBtn.disabled = !allValid;
}

  // Attach input listeners to all required fields in step 1
  document.querySelectorAll('.step-1 [required]').forEach(input => {
    input.addEventListener('input', checkStep1Fields);
  });

  // Run check on page load and when showing step 1
  checkStep1Fields();
  modal.addEventListener("shown.bs.modal", checkStep1Fields);


  modal.addEventListener("shown.bs.modal", () => showStep(1));
  modal.addEventListener("hidden.bs.modal", () => showStep(1));

  showStep(1);

  function setupImagePreview(inputId, previewId, boxId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);
    const box = document.getElementById(boxId);

    input?.addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (ev) {
          preview.src = ev.target.result;
          preview.style.display = 'block';
          // Optionally hide icon/text
          box.querySelector('i').style.display = 'none';
          box.querySelector('span').style.display = 'none';
        };
        reader.readAsDataURL(file);
      } else {
        preview.src = '';
        preview.style.display = 'none';
        box.querySelector('i').style.display = '';
        box.querySelector('span').style.display = '';
      }
    });
  }

  const form = document.getElementById("createCharityForm");
  if (!modal || !form) return;

  modal.addEventListener("hidden.bs.modal", function () {
    form.reset();
    showStep(1); // Reset to first step if needed
  });

  

  setupImagePreview('id_upload', 'id_upload_preview', 'id_upload_box');
  setupImagePreview('face_front', 'face_front_preview', 'face_front_box');
  setupImagePreview('face_side', 'face_side_preview', 'face_side_box');
});

</script>


