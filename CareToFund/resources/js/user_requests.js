// Update user details
$(document).ready(function () {
  // Uses event delegation to dynamically load content
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

// Function to reload the header only
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

// Update user password
$(document).ready(function () {
  // Uses event delegation to dynamically load content
  $(document).on('submit', '#editPasswordForm', function(e) {
    const newPassword = $('#newPassword').val();
    const confirmPassword = $('#confirmPassword').val();
    if (newPassword !== confirmPassword) {
      e.preventDefault();
      alert('New Password and Confirm Password do not match.');
      return;
    }
    e.preventDefault();
    updateUserPassword();
  });
});

function updateUserPassword() {
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/updateUserPassword",
        method: "POST",
        data: {
            currentPassword: $('#currentPassword').val(),
            newPassword: $('#newPassword').val(),
        },
        dataType: 'json', // Ensure jQuery parses JSON automatically
        success: function (result) {
            console.log('Password update response:', result);
            if (result.success) {
                reloadHeader();
                $('#resetPasswordModal').modal('hide'); // Only hide modal after success
                alert(result.message || 'Password updated successfully.');
            } else {
                alert(result.message || 'Password update failed.');
            }
        },
        error: function (xhr, status, error) {
            // Show raw response for debugging
            console.log('AJAX error:', xhr.responseText);
            alert("Something went wrong sa pag update ng password");
        },
    });
}

