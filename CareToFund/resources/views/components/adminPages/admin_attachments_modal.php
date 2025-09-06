<!-- Modal -->
<div class="modal fade" id="requestDetailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 700px;">
        <div class="modal-content" id="admin_request_details">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center pb-2 px-0" style="border-bottom: 2.3px solid #1b3c53;">
                    <p class="modal-title fw-bold" style="color: #1b3c53;"><?= ucfirst($requestDetails[0]['name']); ?>'s Charity Attachments</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="d-flex align-items-start flex-column flex-lg-row justify-content-between gap-3 py-3 bg-light border border-2 border-secondary-subtle rounded-3 px-3 mt-2" style="width: 100%;">
                    <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                Charity Request ID
                            </p>
                            <p class="m-0 ms-3 bg-secondary-subtle px-2 rounded-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"><?= $requestDetails[0]['request_id']; ?></span>
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                Charity Request ID
                            </p>
                            <p class="m-0 ms-3 bg-secondary-subtle px-2 rounded-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"><?= $requestDetails[0]['id_type_used']; ?></span>
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class="m-0 fw-bold" style="font-size: 0.9rem; width: 100%;">
                                Charity Request ID
                            </p>
                            <p class="m-0 ms-3 bg-secondary-subtle px-2 rounded-3" style="font-size: 0.9rem; width: 100%;">
                                <span class="fw-normal"><?= $requestDetails[0]['id_number']; ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-center align-items-start align-self-center">
                        <p class="m-0 fw-bold mb-1" style="font-size: 0.9rem;">
                            ID Attachment
                        </p>
                        <div
                            class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                            style="overflow:hidden; max-width: 500px;  height: 250px; border-radius: 10px; cursor: pointer;"
                            data-bs-toggle="modal"
                            data-bs-target="#imageResizeModal"
                            data-image-src="<?= $requestDetails[0]['id_att_link']; ?>">
                            <img
                                id="id_image_details"
                                class="img-fluid align-self-center"
                                style="max-height: 210px; object-fit: cover; "
                                src="<?= $requestDetails[0]['id_att_link']; ?>"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center  mt-3">
                    <p class="m-0 fw-bold" style="color: #1b3c53;">
                        Face Verification
                    </p>
                    <button
                        class="btn btn-sm btn-cool text-white"
                        data-request-id="<?= $requestDetails[0]['request_id']; ?>"
                        data-bs-toggle="modal"
                        data-bs-target="#faceCompareModal">
                        Verify Faces &nbsp;
                        <i class="bi bi-caret-right-fill"></i>
                    </button>
                </div>
                <div class="mt-2 d-flex bg-light flex-column flex-lg-row border border-2 border-secondary-subtle p-3 rounded-3 justify-content-between align-items-center gap-4" style="width: 100%;">
                    <div class="d-flex flex-column  align-items-start ">
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class=" m-0 mb-2 fw-bold align-self-start" style="font-size: 0.9rem;">
                                Front Face Image
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px;  border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['front_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: contain; "
                                    src="<?= $requestDetails[0]['front_face_link']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column  align-items-start ">
                        <div class="d-flex flex-column justify-content-center align-items-start gap-1">
                            <p class=" m-0 mb-2 fw-bold align-self-start" style="font-size: 0.9rem;">
                                Side Face Image
                            </p>
                        </div>
                        <div class="d-flex flex-column justify-content-center align-items-start">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px; border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['side_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: cover; "
                                    src="<?= $requestDetails[0]['side_face_link']; ?>"
                                    alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="faceCompareModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="d-flex justify-content-between align-items-center pb-2 px-0" style="border-bottom: 2.3px solid #1b3c53;">
                    <p class="modal-title fw-bold" style="color: #1b3c53;"><?= ucfirst($requestDetails[0]['name']); ?>'s Face Comparison</p>
                    <button class="btn btn-transparent p-0 text-secondary " data-bs-toggle="modal" data-bs-target="#requestDetailsModal">Back</button>
                </div>
                <div class="mt-2 d-flex bg-light flex-column border border-2 border-secondary-subtle p-3 rounded-3 justify-content-center align-items-start gap-2" style="width: 100%;">
                    <p class="m-0 fw-bold" style="color: #1b3c53;">
                        Front Face Comparison
                    </p>
                    <div class="d-flex justify-content-between align-items-center  w-100 flex-column flex-lg-row">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px;  border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['front_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: contain; "
                                    src="<?= $requestDetails[0]['front_face_link']; ?>"
                                    alt="">
                            </div>
                            <p class="text-secondary m-0 mt-1" style="font-size: 0.8rem;">
                                Charity Request Front Picture
                            </p>
                        </div>
                        <i class="bi bi-arrows text-muted" style="font-size: 50px;"></i>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px;  border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['front_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: contain; "
                                    src="<?= $requestDetails[0]['front_face_link']; ?>"
                                    alt="">
                            </div>
                            <p class="text-secondary m-0 mt-1" style="font-size: 0.8rem;">
                                Registered Front Picture
                            </p>
                        </div>

                    </div>

                </div>
                <div class="mt-2 d-flex bg-light flex-column border border-2 border-secondary-subtle p-3 rounded-3 justify-content-center align-items-start gap-2" style="width: 100%;">
                    <p class="m-0 fw-bold" style="color: #1b3c53;">
                        Side Face Comparison
                    </p>
                    <div class="d-flex justify-content-between align-items-center  w-100 flex-column flex-lg-row">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px;  border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['side_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: contain; "
                                    src="<?= $requestDetails[0]['side_face_link']; ?>"
                                    alt="">
                            </div>
                            <p class="text-secondary m-0 mt-1" style="font-size: 0.8rem;">
                                Charity Request Side Picture
                            </p>
                        </div>
                        <i class="bi bi-arrows text-muted" style="font-size: 50px;"></i>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <div
                                class="d-flex justify-content-center align-items-center bg-secondary-subtle border border-2 border-secondary-subtle"
                                style="overflow:hidden; max-width: 300px;  height: 450px;  border-radius: 10px; cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#imageResizeModal"
                                data-image-src="<?= $requestDetails[0]['side_face_link']; ?>">
                                <img
                                    id="id_image_details"
                                    class="img-fluid align-self-center"
                                    style=" object-fit: contain; "
                                    src="<?= $requestDetails[0]['side_face_link']; ?>"
                                    alt="">
                            </div>
                            <p class="text-secondary m-0 mt-1" style="font-size: 0.8rem;">
                                Registered Side Picture
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>