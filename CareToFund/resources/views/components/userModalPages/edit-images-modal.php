<div class="modal fade" id="editImagesModal" tabindex="-1" aria-labelledby="editImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-3 py-2 rounded-3 shadow-sm">
            <div class="modal-header px-2 py-2" style="border-bottom: none;">
                <h5 class="modal-title">Attachments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <form id="editDetailsForm" method="POST" action="/Shanty-Dope-Proj/CareToFund/updateUser">
                    <div class="d-flex flex-column align-items-center bg-light p-3 rounded-3 mb-3" style="border: 2px solid #c5c5c5ff;">
                        <div class="d-flex flex-column align-items-center gap-2">
                            <span class="fs-6 fw-bold">User Profile Picture</span>
                            <label
                                for="img_profile"
                                class="d-flex flex-column align-items-center justify-content-center border border-2 border-secondary rounded bg-secondary-subtle"
                                style="width: 180px; height: 180px; cursor: pointer; overflow: hidden;">
                                <div id="img_profile_label" class="d-flex flex-column align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box text-muted" style="font-size: 50px;"></i>
                                    <span class="text-muted" style="font-size: 0.8rem;">Click to upload Image</span>
                                </div>
                                <input
                                    class="form-control mb-4 d-none"
                                    type="file" id="img_profile"
                                    name="img_profile"
                                    accept="image/*"
                                    required">
                                <img id="preview_img_profile" src="#" alt="Preview" style="display:none; width:180px; object-fit:cover;" />
                            </label>
                        </div>
                        <span class="fs-6 fw-bold mt-4 mb-2">Face Identification</span>
                        <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <label
                                    for="img_front"
                                    class="d-flex flex-column align-items-center justify-content-center border border-2 border-secondary rounded bg-secondary-subtle"
                                    style="width: 180px; height: 250px; cursor: pointer; overflow: hidden;">
                                    <div id="img_front_label" class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted" style="font-size: 50px;"></i>
                                        <span class="text-muted" style="font-size: 0.8rem;">Click to upload Image</span>
                                    </div>
                                    <input
                                        class="form-control mb-4 d-none"
                                        type="file" id="img_front"
                                        name="img_front"
                                        accept="image/*"
                                        required">
                                    <img id="preview_img_front" class="img-fluid" src="#" alt="Preview" style="display:none; width:180px; object-fit:cover;" />
                                </label>
                                <span style="font-size: 0.9rem;">Front Face</span>
                            </div>
                            <div class="d-flex flex-column align-items-center gap-1">
                                <label
                                    for="img_side"
                                    class="d-flex flex-column align-items-center justify-content-center border border-2 border-secondary rounded bg-secondary-subtle"
                                    style="width: 180px; height: 250px; cursor: pointer; overflow: hidden;">
                                    <div id="img_side_label" class="d-flex flex-column align-items-center justify-content-center">
                                        <i class="bi bi-image text-muted" style="font-size: 50px;"></i>
                                        <span class="text-muted" style="font-size: 0.8rem;">Click to upload Image</span>
                                    </div>
                                    <input
                                        class="form-control mb-4 d-none"
                                        type="file" id="img_side"
                                        name="img_side"
                                        accept="image/*"
                                        required">
                                    <img id="preview_img_side" src="#" alt="Preview" style="display:none; width:180px; object-fit:cover;" />
                                </label>
                                <span style="font-size: 0.9rem;">Side Face</span>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer p-0 " style="border-top: none;">
                        <button type="button" class="btn m-0 p-2 btn-secondary" style="border-radius: 8px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#profileModal">Back</button>
                        <button type="" class="btn px-4 py-2 btn-cool text-white"
                            style=" border-radius: 8px; font-size: 0.9rem;">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>