var requestSearchValue = "";
var charitySearchValue = "";
// Initialize the search input
$(document).ready(function () {
  loadPendingCharity();
  fetchUserStatus();

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
  loadMyCharity();
});

// Initialize the create charity form submission
$("#createCharityForm").on("submit", function (e) {
  e.preventDefault();

  var form = this;
  var formData = new FormData(form);

  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/createCharityProcess",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (result) {
      if (typeof result === "string") {
        try {
          result = JSON.parse(result);
        } catch (e) {
          alert("Unexpected server response.");
          return;
        }
      }

      if (result.success) {
        var createCharityModal = bootstrap.Modal.getInstance(
          document.getElementById("createCharityModal")
        );
        if (createCharityModal) createCharityModal.hide();

        var charityCreatedModal = new bootstrap.Modal(
          document.getElementById("charity_created")
        );
        charityCreatedModal.show();
        loadPendingCharity();
        fetchUserStatus();
      } else {
        alert(result.message || "Something went wrong.");
      }
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
});

// Initialize the load pending charity function
function loadPendingCharity() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadPendingCharity",
    method: "GET",
    success: function (result) {
      console.log(JSON.parse(result));
      var data = JSON.parse(result);
      if (data.length !== 0) {
        // Sort by latest
        data.sort(function (a, b) {
          return new Date(b.datetime) - new Date(a.datetime);
        });

        $("#pendingDescription").text(data[0].description);
        $("#pendingDatetime").text(data[0].datetime);
        $("#pendingFundLimit").text(
          "₱ " + Number(data[0].fund_limit).toLocaleString() + ".00"
        );
        $("#pendingDuration").text(data[0].duration + " Day/s");
      }
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

// Initialize the fetch user status function
function fetchUserStatus() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/fetchUserStatus",
    method: "GET",
    success: function (result) {
      console.log(JSON.parse(result));
      var data = JSON.parse(result);
      if (data[0].status === "Pending") {
        $("#newCharityCard").hide();
        $("#idPendingCharity").show();
        $("#myCharityCard").hide();

        // User is pending
      } else if (data[0].status === "Offline") {
        $("#newCharityCard").show();
        $("#idPendingCharity").hide();
        $("#myCharityCard").hide();
        // User is offline
      } else if (data[0].status === "Active") {
        $("#newCharityCard").hide();
        $("#idPendingCharity").hide();
        $("#myCharityCard").show();
        // User is active
      }
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

// Initialize the view charity requests function
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
    // If clicked again, reset to default (no filter)
    currentFilter = null;
    viewCharityRequests();
    viewCharities();
    if (filter === "Pending") {
      $("#pendingRequestsBtn").addClass("btn-cool").removeClass("btn-yellow");
    } else if (filter === "Rejected") {
      $("#rejectedRequestsBtn").addClass("btn-cool").removeClass("btn-red");
    } else if (filter === "Approved") {
      $("#approvedRequestsBtn").addClass("btn-cool").removeClass("btn-green");
    }
    if (filter === "Ongoing") {
      $("#ongoingCharityBtn").addClass("btn-cool").removeClass("btn-yellow");
    } else if (filter === "Finished") {
      $("#finishedCharityBtn").addClass("btn-cool").removeClass("btn-green");
    }
  } else {
    currentFilter = filter;
    viewCharityRequests(filter);
    viewCharities(filter);
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

function charityApprovalRequest() {
  var requestId = $("#admin_request_approval").data("request-id");
  var userId = $("#admin_request_approval").data("user-id");
  console.log(userId);
  console.log(requestId);
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/approveCharityRequest",
    method: "POST",
    data: {
      request_id: requestId,
      user_id: userId,
    },
    success: function (response) {
      viewCharityRequests();
      fetchUserStatus();
      loadMyCharity(response);
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

function charityRejectionRequest() {
  var requestId = $("#admin_request_rejection").data("request-id");
  var userId = $("#admin_request_rejection").data("user-id");

  console.log(requestId);
  console.log(userId);

  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/rejectCharityRequest",
    method: "POST",
    data: {
      request_id: requestId,
      user_id: userId,
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

// Load my charity details
function loadMyCharity() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadMyCharity",
    method: "GET",
    success: function (result) {
      var data = JSON.parse(result);
      if (data.length === 0) {
        console.log("No charity details found.", data.length);
        return;
      } else {
        console.log("My charity details:", data);
        $("#charityDescription").text(data[0].description);
        $("#charityDatetime").text("Approved at: " + data[0].approved_datetime);
        $("#charityRaised").text(
          `₱ ${Number(data[0].raised).toLocaleString()}.00`
        );
        $("#charityFundLimit").text(
          `₱ ${Number(data[0].fund_limit).toLocaleString()}.00`
        );
        startCountdown(
          data[0].approved_datetime,
          data[0].duration,
          "#charityDuration",
          {
            onEnd: () => {
              document.querySelector("#charityDuration").textContent =
                "Finished!";
            },
            action: () => {
              updateCharities();
              fetchUserStatus();
            }
          }
        );

        $("#charityProgress")
          .css("width", `${(data[0].raised / data[0].fund_limit) * 100}%`)
          .attr("aria-valuenow", (data[0].raised / data[0].fund_limit) * 100);
      }
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

// Countdown timer function
function startCountdown(startDatetime, durationDays, selector, options = {}) {
  let timer;

  // Default options
  const settings = {
    onEnd: () => {
      const el = document.querySelector(selector);
      if (el) el.textContent = "Ended";
    },
    label: "left...",
    action: null,
    ...options,
  };

  // Calculate end time
  const start = new Date(startDatetime);
  const end = new Date(start.getTime() + durationDays * 24 * 60 * 60 * 1000);
  const now = new Date();

  // If already expired, do nothing at all
  if (end - now <= 0) {
    return;
  }

  // Update countdown function
  function updateCountdown() {
    const now = new Date();
    const diff = end - now;

    if (diff <= 0) {
      clearInterval(timer);
      settings.onEnd(); // Run custom callback
      if (typeof settings.action === "function") {
        settings.action(); // Run extra action if provided
      }
      return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    const countdownEl = document.querySelector(selector);
    if (countdownEl) {
      countdownEl.textContent =
        `${days ? days + "d " : ""}` +
        `${hours ? hours + "h " : ""}` +
        `${minutes ? minutes + "m " : ""}` +
        `${seconds ? seconds + "s " : ""}` +
        settings.label;
    }
  }

  updateCountdown();
  timer = setInterval(updateCountdown, 1000);
}

// Update my charity function
function updateCharities() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/updateCharity",
    method: "POST",
    success: function (result) {
      if (typeof result === "string") {
        console.log("Charity updated successfully");
      }
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

