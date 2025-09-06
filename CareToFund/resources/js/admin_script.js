var requestSearchValue = "";
var charitySearchValue = "";
// Initialize the search input
$(document).ready(function () {

  $("#requestCharitySearch").on("keyup", function () {
    requestSearchValue = $(this).val().toLowerCase().trim();

    viewCharityRequests();
  });
  $("#charitySearch").on("keyup", function () {
    charitySearchValue = $(this).val().toLowerCase().trim();

    viewCharities();
  });
  showUsers();
  viewCharityRequests();
  viewCharities();
  updateCharities();
});

function viewCharityRequests(filter) {
  var search = requestSearchValue;
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/viewCharityRequests",
    method: "GET",
    data: {
      filter: filter,
      search: search,
    },
    success: function (result) {
      $("#charityRequestsContainer").empty();
      $("#charityRequestsContainer").html(result);
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

let currentFilter = null;
let userCurrentPage = 1;
let userTotalPages = 1;
function handleFilterClick(filter) {
  if (currentFilter === filter) {
    currentFilter = null;
    viewCharityRequests();
    viewCharities();

    $("#pendingRequestsBtn, #rejectedRequestsBtn, #approvedRequestsBtn")
      .removeClass("btn-yellow btn-red btn-green")
      .addClass("btn-cool");
    $("#ongoingCharityBtn, #finishedCharityBtn, #cancelledCharityBtn")
      .removeClass("btn-yellow btn-green btn-red")
      .addClass("btn-cool");
  } else {
    currentFilter = filter;
    viewCharityRequests(filter);
    viewCharities(filter);

    $("#pendingRequestsBtn, #rejectedRequestsBtn, #approvedRequestsBtn")
      .removeClass("btn-yellow btn-red btn-green")
      .addClass("btn-cool");
    $("#ongoingCharityBtn, #finishedCharityBtn, #cancelledCharityBtn")
      .removeClass("btn-yellow btn-green btn-red")
      .addClass("btn-cool");

    if (filter === "Pending") {
      $("#pendingRequestsBtn").removeClass("btn-cool").addClass("btn-yellow");
    } else if (filter === "Rejected") {
      $("#rejectedRequestsBtn").removeClass("btn-cool").addClass("btn-red");
    } else if (filter === "Approved") {
      $("#approvedRequestsBtn").removeClass("btn-cool").addClass("btn-green");
    }
    if (filter === "Ongoing") {
      $("#ongoingCharityBtn").removeClass("btn-cool").addClass("btn-yellow");
    } else if (filter === "Finished") {
      $("#finishedCharityBtn").removeClass("btn-cool").addClass("btn-green");
    } else if (filter === "Cancelled") {
      $("#cancelledCharityBtn").removeClass("btn-cool").addClass("btn-red");
    }
  }
}

function viewCharities(filter) {
  var search = charitySearchValue;
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/viewCharities",
    method: "GET",
    data: {
      filter: filter,
      search: search
    },
    success: function (result) {
      console.log(result);

      $("#charitiesContainer").empty();
      $("#charitiesContainer").html(result);
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

function charityRequestConfirmation(requestId, userId, confirmation) {

  console.log(requestId);
  console.log(userId);
  console.log(confirmation);

  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/charityRequestConfirmation",
    method: "POST",
    data: {
      request_id: requestId,
      user_id: userId,
      confirmation: confirmation
    },
    success: function (response) {
      viewCharityRequests();
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

function getCharityRequestDetails(requestId) {
  // console.log(requestId);
  // console.log(userId);
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/getCharityRequestDetails",
    method: "POST",
    data: {
      request_id: requestId,
    },
    success: function (result) {
      // console.log(result);
      $("#requestDetailsModal").each(function () {
        const modal = bootstrap.Modal.getInstance(this);
        if (modal) modal.dispose();
        $(this).remove();
      });

      // Inject and show new modal
      // $("#modalContainer").empty();
      $("#modalContainer").html(result);
      new bootstrap.Modal(
        document.getElementById("requestDetailsModal")
      ).show();
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

// document.addEventListener('DOMContentLoaded', function() {
//     function showSection(section) {
//         document.getElementById('admin-charities-section').style.display = (section === 'charities') ? '' : 'none';
//         document.getElementById('admin-requests-section').style.display = (section === 'requests') ? '' : 'none';
//         document.getElementById('admin-users-section').style.display = (section === 'users') ? '' : 'none';
//     }

//     document.getElementById('nav-charities').addEventListener('click', function(e) {
//         e.preventDefault();
//         $("#nav-charities").addClass("active");
//         $("#nav-requests").removeClass("active");
//         $("#nav-users").removeClass("active");
//         showSection('charities');
//     });
//     document.getElementById('nav-requests').addEventListener('click', function(e) {
//         e.preventDefault();
//         $("#nav-requests").addClass("active");
//         $("#nav-charities").removeClass("active");
//         $("#nav-users").removeClass("active");
//         showSection('requests');
//     });
//     document.getElementById('nav-users').addEventListener('click', function(e) {
//         e.preventDefault();
//         $("#nav-users").addClass("active");
//         $("#nav-charities").removeClass("active");
//         $("#nav-requests").removeClass("active");
//         showSection('users');
//     });
// });

function cancelCharity(charityId, userId) {
  console.log(charityId, userId);
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/cancelCharity",
    method: "POST",
    data: {
      charity_id: charityId,
      user_id: userId
    },
    success: function (response) {
      // Handle success
      viewCharities();
      console.log(response);
    },
    error: function (error) {
      // Handle error
      console.error(error);
    }
  });
}



function showUsers(page = 1) {
  userCurrentPage = page;
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/getAllUsers",
    method: "GET",
    data: { page: userCurrentPage },
    success: function (result) {
      $("#usersContainer").empty();
      $("#usersContainer").html(result);
      renderUserPagination();
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

function renderUserPagination() {
  // Get totalPages from a hidden element in the result
  let totalPages = $("#usersContainer").find('[data-total-pages]').data('total-pages');
  if (!totalPages) totalPages = 1;
  userTotalPages = totalPages;
  let paginationHtml = '';
  if (userTotalPages > 1) {
    paginationHtml += '<ul class="pagination gap-3 m-0">';
    paginationHtml += `<li><button class="btn btn-sm" ${userCurrentPage === 1 ? 'disabled' : ''} onclick="showUsers(${userCurrentPage - 1})">&lt;</button></li>`;
    for (let i = 1; i <= userTotalPages; i++) {
      paginationHtml += `<li><button class="btn btn-sm ${i === userCurrentPage ? 'btn-primary' : ''}" onclick="showUsers(${i})">${i}</button></li>`;
    }
    paginationHtml += `<li><button class="btn btn-sm" ${userCurrentPage === userTotalPages ? 'disabled' : ''} onclick="showUsers(${userCurrentPage + 1})">&gt;</button></li>`;
    paginationHtml += '</ul>';
  } else {
    paginationHtml = `<ul class="pagination gap-3 m-0"><li><button class="btn btn-sm btn-primary">1</button></li></ul>`;
  }
  $("#userPagination").html(paginationHtml);
}

$(document).on('click', '[data-bs-target="#admin_user_edit"]', function () {
  var userId = $(this).data('user-id');
  // Remove existing modal
  $('#admin_user_edit').remove();
  $('.modal-backdrop').remove();
  $('body').removeClass('modal-open');

  $.ajax({
    url: '/Shanty-Dope-Proj/CareToFund/editUser',
    method: 'POST',
    data: { user_id: userId },
    success: function(html) {
      $('body').append(html);
      var modal = new bootstrap.Modal(document.getElementById('admin_user_edit'));
      modal.show();
    },
    error: function() {
      alert('Failed to load user data.');
    }
  });
});

// Handle update form submit
$(document).on('submit', '#editUserForm', function(e) {
  e.preventDefault();
  $.ajax({
    url: '/Shanty-Dope-Proj/CareToFund/editUser',
    method: 'POST',
    data: $(this).serialize(),
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        $('#admin_user_edit').modal('hide');
        $('#admin_user_edited').modal('show');
        showUsers(); // Refresh user list
      } else {
        alert(response.message);
      }
    },
    error: function() {
      alert('May mali sa js.');
    }
  });
});

// Open delete modal and store user ID
$(document).on('click', '.open-delete-modal', function () {
  var userId = $(this).data('user-id');
  $('#delete_user_id').val(userId);
});

// Handle confirm delete
$(document).on('click', '#confirmDeleteBtn', function () {
  var userId = $('#delete_user_id').val();
  $.ajax({
    url: '/Shanty-Dope-Proj/CareToFund/deleteUser',
    method: 'POST',
    data: { user_id: userId },
    dataType: 'json',
    success: function(response) {
      if (response.success) {
        $('#admin_user_delete').modal('hide');
        $('#admin_user_deleted').modal('show');
        showUsers();
      } else {
        alert(response.message);
      }
    },
    error: function() {
      alert('May something went wrong. Please try again.');
    }
  });
});