<!-- Modal -->
<div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="min-width: 800px;">
    <div class="modal-content" id="admin_request_details">
      <div class="modal-body">
        <div class="d-flex justify-content-between align-items-center p-2 px-0" style="border-bottom: 4px solid #1b3c53;">
        <h5 class="modal-title fw-bold" id="exampleModalLabel" style="color: #1b3c53;">John Doe's Charity Attachments</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="d-flex flex-column align-items-start justify-content-center py-2">
        <p class="m-0 fw-bold" style="font-size: 1rem;">
            Charity Request ID: <span class="fw-normal" id="request_id_details"></span>
        </p>
        <p class="m-0 fw-bold" style="font-size: 1rem;">
            ID Type Used: <span class="fw-normal" id="id_type_used_details"></span>
        </p>
        <p class="m-0 fw-bold" style="font-size: 1rem;">
            ID Number: <span class="fw-normal" id="id_number_details"></span>
        </p>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-start">
        <p class=" m-0 mb-1 align-self-start">
            ID Image
        </p>
        <img id="id_image_details" class="img-fluid align-self-center" style="max-height: 500px; object-fit: cover; border: 3px solid #1b3c53; border-radius: 5px;"  src="" alt="">
        </div>
        <div class="d-flex flex-column mt-2">
        <p class="m-0 fw-bold fs-5" style="color: #1b3c53;">
            Face Verification
        </p>
        <div class="d-flex flex-column justify-content-center align-items-start">
            <p class=" m-0 mb-1 align-self-start">
            Front Face Image:
            </p>
            <img id="front_face_image_details" class="img-fluid align-self-center" style="max-height: 500px; object-fit: cover; border: 3px solid #1b3c53; border-radius: 5px;"  src="" alt="">
        </div>
        <div class="d-flex flex-column justify-content-center align-items-start mt-3">
            <p class=" m-0 mb-1 align-self-start">
            Side Face Image:
            </p>
            <img id="side_face_image_details" class="img-fluid align-self-center" style="max-height: 500px; object-fit: cover; border: 3px solid #1b3c53; border-radius: 5px;"  src="" alt="">
        </div>
    </div>
    </div>
  </div>
</div>

