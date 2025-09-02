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
function handleFilterClick(filter) {
  if (currentFilter === filter) {
    currentFilter = null;
    viewCharityRequests();
    viewCharities();

    $("#pendingRequestsBtn, #rejectedRequestsBtn, #approvedRequestsBtn")
      .removeClass("btn-yellow btn-red btn-green")
      .addClass("btn-cool");
    $("#ongoingCharityBtn, #finishedCharityBtn")
      .removeClass("btn-yellow btn-green")
      .addClass("btn-cool");
  } else {
    currentFilter = filter;
    viewCharityRequests(filter);
    viewCharities(filter);

    $("#pendingRequestsBtn, #rejectedRequestsBtn, #approvedRequestsBtn")
      .removeClass("btn-yellow btn-red btn-green")
      .addClass("btn-cool");
    $("#ongoingCharityBtn, #finishedCharityBtn")
      .removeClass("btn-yellow btn-green")
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
      // console.log(result);

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
      console.log(result);
      $("#requestDetailsModal").each(function () {
        const modal = bootstrap.Modal.getInstance(this);
        if (modal) modal.dispose();
        $(this).remove();
      });

      // Inject and show new modal
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