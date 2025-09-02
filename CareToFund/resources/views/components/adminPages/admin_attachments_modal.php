<!-- Modal -->
<div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 850px;">
        <div class="modal-content" id="admin_request_details">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center pb-2 px-0" style="border-bottom: 2.3px solid #1b3c53;">
                    <p class="modal-title fw-bold" style="color: #1b3c53;"><?= ucfirst($requestDetails[0]['name']); ?>'s Charity Attachments</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="d-flex align-items-start justify-content-between py-3 bg-light rounded-3 px-3 mt-2" style="width: 100%;">
                    <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                        <div class="d-flex flex-column justify-content-center align-items-start ">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                Charity Request ID
                            </p>
                            <p class="m-0 ms-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"> <?= $requestDetails[0]['request_id']; ?> </span>
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start ">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                ID Type Used
                            </p>
                            <p class="m-0 ms-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"> <?= $requestDetails[0]['id_type_used']; ?> </span>
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start ">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                ID Number
                            </p>
                            <p class="m-0 ms-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"> <?= $requestDetails[0]['id_number']; ?> </span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start">
                        <p class="m-0 fw-bold mb-1" style="font-size: 0.9rem;">
                            ID Attachment
                        </p>
                        <div
                            class="d-flex justify-content-center align-items-center "
                            style="overflow:hidden; width: 100%; min-width: 375px; height: 210px; background-color: #e8eaedff; border-radius: 10px; cursor: pointer;"
                            data-bs-toggle="modal" 
                            data-bs-target="#imageResizeModal"
                            data-image-src="<?= $requestDetails[0]['id_att_link']; ?>"
                            >
                            <img
                                id="id_image_details"
                                class="img-fluid align-self-center"
                                style="max-height: 210px; object-fit: cover; "
                                src="<?= $requestDetails[0]['id_att_link']; ?>"
                                alt="">
                        </div>
                    </div>
                </div>
                <p class="m-0 fw-bold mt-3" style="color: #1b3c53;">
                    Face Verification
                </p>
                <div class="mt-2 d-flex bg-light p-3 rounded-3 justify-content-between align-items-center gap-4" style="width: 100%;">
                    <div class="d-flex flex-column  align-items-start ">
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class=" m-0 mb-1 fw-bold align-self-start">
                                Front Face Image
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start">
                            <div
                                class="d-flex justify-content-center align-items-center "
                                style="overflow:hidden; width: 100%; min-width: 375px; height: 210px; background-color: #e8eaedff; border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal" 
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['front_face_link']; ?>"
                                >
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style="max-height: 210px; object-fit: cover; "
                                    src="<?= $requestDetails[0]['front_face_link']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column  align-items-start ">
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class=" m-0 mb-1 fw-bold align-self-start">
                                Side Face Image
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start">
                            <div
                                class="d-flex justify-content-center align-items-center "
                                style="overflow:hidden; width: 100%; min-width: 375px; height: 210px; background-color: #e8eaedff; border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal" 
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['side_face_link']; ?>"
                                >
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style="max-height: 210px; object-fit: cover; "
                                    src="<?= $requestDetails[0]['side_face_link']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>