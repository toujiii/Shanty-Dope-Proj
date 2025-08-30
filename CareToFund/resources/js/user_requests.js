
// Update user details
$(document).ready(function () {
  $('#editDetailsForm').on('submit', function(e) {
    e.preventDefault();
    editUserDetails();
  });
});

function editUserDetails() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/updateUser",
    method: "POST",
    data: {
      name: $('#editName').val(),
      email: $('#editEmail').val(),
    //   gcash_number: $('#editGcashNumber').val()
    },
    success: function (result) {
        console.log('AJAX response:', result);
      var res = JSON.parse(result);
      if (res.success) {
        // Optionally update the modal fields or display a success message
        reloadHeader();
        $('#editName').val($('editName').val());
        $('#editEmail').val($('editEmail').val());
        // $('#editDetailsSuccessMsg').text(res.message).show();
        // Do NOT close the modal
      } else {
        // $('#editDetailsErrorMsg').text(res.message).show();
      }
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}


function reloadHeader(){
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/header",
        method: "GET",
        success: function(result) {
            console.log('Header reloaded');
            // Update the header with the new content
            $('#headerContainer').html(result);
        },
        error: function(error) {
            alert("Something went wrong.");
        }
    });
}