<div class="modal fade" id="editImagesModal" tabindex="-1" aria-labelledby="editImagesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content px-3 py-2 rounded-3 shadow-sm">
            <div class="modal-header px-2 py-2" style="border-bottom: none;">
                <h5 class="modal-title">Verification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <form id="uploadUserImagesForm" method="POST" enctype="multipart/form-data">
                    <div class="d-flex flex-column align-items-center bg-light p-3 rounded-3 mb-3" style="border: 2px solid #c5c5c5ff;">
                        <span class="fs-6 fw-bold mt-2 mb-2 text-center">
                            Face Identification
                            
                        </span>
                        <div class="d-flex flex-column flex-lg-row align-items-center gap-4">
                            <div class="d-flex flex-column align-items-center gap-1">
                                <?php
                                if (isset($userDetails[0]['user_front_link'])) {
                                ?>
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center border border-2 border-secondary rounded bg-secondary-subtle"
                                        style="width: 180px; height: 250px; overflow: hidden;">
                                        <img id="preview_img_front" class="img-fluid" src="<?php echo $userDetails[0]['user_front_link'] ?>" alt="Preview" style=" width:180px; object-fit:cover;" />
                                    </div>
                                <?php
                                } else {
                                ?>
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
                                            name="user_front_image"
                                            accept="image/*"
                                            required">
                                        <img id="preview_img_front" class="img-fluid" src="#" alt="Preview" style="display:none; width:180px; object-fit:cover;" />
                                    </label>
                                <?php
                                }
                                ?>
                                <span style="font-size: 0.9rem;">Front Face</span>
                            </div>
                            <div class="d-flex flex-column align-items-center gap-1">
                                <?php
                                if (isset($userDetails[0]['user_front_link'])) {
                                ?>
                                    <div
                                        class="d-flex flex-column align-items-center justify-content-center border border-2 border-secondary rounded bg-secondary-subtle"
                                        style="width: 180px; height: 250px; overflow: hidden;">
                                        <img id="preview_img_front" class="img-fluid" src="<?php echo $userDetails[0]['user_side_link'] ?>" alt="Preview" style=" width:180px; object-fit:cover;" />
                                    </div>
                                <?php
                                } else {
                                ?>
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
                                            name="user_side_image"
                                            accept="image/*"
                                            required">
                                        <img id="preview_img_side" src="#" alt="Preview" style="display:none; width:180px; object-fit:cover;" />
                                    </label>
                                <?php
                                }
                                ?>
                                <span style="font-size: 0.9rem;">Side Face</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-0 " style="border-top: none;">
                        <button type="button" class="btn m-0 p-2 btn-secondary" style="border-radius: 8px; font-size: 0.9rem;" data-bs-toggle="modal" data-bs-target="#profileModal">Back</button>
                        <?php
                        if (!isset($userDetails[0]['user_front_link']) && !isset($userDetails[0]['user_side_link'])) {
                        ?>
                            <button type="submit" class="btn px-4 py-2 btn-cool text-white"
                                style=" border-radius: 8px; font-size: 0.9rem;">
                                Save Changes
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imageUploadSuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center text-center gap-2 ">
                <img src="/Shanty-Dope-Proj/CareToFund/resources/img/Ok-amico.svg" style="width: 150px;" alt="">
                <p class="fs-5 fw-bold m-0 2nd-modal-head">
                    Success!
                </p>
                <p class="m-0 2nd-modal-description">
                    Your verification images have been uploaded successfully.
                </p>
            </div>
            <div class=" d-flex justify-content-center align-items-center gap-3 m-4">
                <button type="button" data-bs-dismiss="modal" class="btn btn-secondary text-white fw-bold"
                onclick="location.reload();"
                >Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#img_front').on('change', function(e) {
            $('#preview_img_front').attr('src', URL.createObjectURL(e.target.files[0])).show();
            $('#img_front_label').addClass('d-none');
        });

        $('#img_side').on('change', function(e) {
            $('#preview_img_side').attr('src', URL.createObjectURL(e.target.files[0])).show();
            $('#img_side_label').addClass('d-none');
        });

        $('#imageUploadSuccessModal').on('hidden.bs.modal', function () {
            location.reload();
        });
    });
</script>