var SearchValue = "";
$(document).ready(function () {
  $("#charitySearching").on("keyup", function () {
    SearchValue = $(this).val().toLowerCase().trim();

    loadCharities();
  });
  // loadPendingCharity();
  fetchUserStatus();
  updateCharities();
  // loadMyCharity();
  loadCharities();
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

$("#sendDonationForm").on("submit", function (e) {
  e.preventDefault();

  var charityId = $("#donateModal").data("charity-id");
  var form = this;
  var formData = new FormData(form);

  // Append charity_id to the FormData
  formData.append("charity_id", charityId);

  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/sendDonation",
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
        var donateModal = bootstrap.Modal.getInstance(
          document.getElementById("donateModal")
        );
        if (donateModal) donateModal.hide();

        var thankYouModal = new bootstrap.Modal(
          document.getElementById("thankYouModal")
        );
        thankYouModal.show();
        loadCharities();
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
      $("#idPendingCharity").empty();
      $("#idPendingCharity").html(result);
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
      // if(result[])
      var data = JSON.parse(result);
      if (data[0].status === "Guest") {
        console.log("User is guest");
      } else {
        if (data[0].status === "Pending") {
          loadPendingCharity();
          $("#createNewCharity").empty();
        }
        if (data[0].status === "Offline") {
          console.log("Users is offline");
          loadCreateCharity();
        }
        if (data[0].status === "Active") {
          loadMyCharity();
          $("#idPendingCharity").empty();
        }
      }
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

function loadCreateCharity() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadCreateCharity",
    method: "GET",
    success: function (result) {
      console.log(result);
      $("#createNewCharity").empty();
      $("#createNewCharity").html(result);
    },
    error: function (error) {
      alert("Something went Wrong.");
    },
  });
}

// Load my charity details
function loadMyCharity() {
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadMyCharity",
    method: "GET",
    success: function (result) {
      $("#myCharity").empty();
      $("#myCharity").html(result);
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

function loadCharities() {
  search = SearchValue;
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadCharities",
    method: "GET",
    data: { search: search },
    success: function (result) {
      // console.log(result);
      $("#userCharities").empty();
      $("#userCharities").html(result);
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}

