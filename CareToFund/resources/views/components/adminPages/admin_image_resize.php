<div class="modal fade" id="imageResizeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 90vw; max-height: 90vh;">
        <div class="modal-content "  >
            <div class="modal-body d-flex justify-content-center" 
                data-bs-dismiss="modal"
                style="cursor: pointer;"
            >
                <img style="width: 100%;" id="image_to_resize" class="img-fluid" src="" alt="">
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