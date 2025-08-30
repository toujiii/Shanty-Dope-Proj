// Update user details
$(document).ready(function () {
  // Use event delegation for dynamically loaded content
  $(document).on('submit', '#editDetailsForm', function(e) {
    e.preventDefault();
    editUserDetails();
  });
});

function editUserDetails() {
  $('.modal-backdrop').remove();
  $('body').removeClass('modal-open');
  $('#editDetailsModal').modal('hide');

  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/updateUser",
    method: "POST",
    data: {
      name: $('#editName').val(),
      email: $('#editEmail').val(),
    },
    success: function (result) {
      console.log('AJAX response:', result);
      reloadHeader(function() {
        // After header reload, show the modal again
        var editModal = new bootstrap.Modal(document.getElementById('editDetailsModal'));
        editModal.show();
      });
    },
    error: function (error) {
      alert("Something went wrong sa pag edit");
    },
  });
}

function reloadHeader(callback){
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/header",
        method: "GET",
        success: function(result) {
            $('#headerContainer').html(result);
            // Re-initialize modal triggers if needed
            if (typeof callback === 'function') callback();
        },
        error: function(error) {
            alert("Something went wrong sa Header");
        }
    });
}