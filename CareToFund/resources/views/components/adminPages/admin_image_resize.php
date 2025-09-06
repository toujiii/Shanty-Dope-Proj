<div class="modal fade" id="imageResizeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: fit-content; max-height: fit-content;">
        <div class="modal-content bg-secondary-subtle border-0">
            <div class="modal-body d-flex justify-content-center align-items-center" 
                data-bs-dismiss="modal"
            >
                <img id="image_to_resize"
                     class="img-fluid"
                     src=""
                     alt=""
                     style="width: 90vw; height: auto; object-fit: contain;" />
            </div>
        </div>
    </div>
</div>
<script>
    $('#imageResizeModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var imageSrc = button.data('image-src');
        var modal = $(this);
        modal.find('#image_to_resize').attr('src', imageSrc);
    });
</script>