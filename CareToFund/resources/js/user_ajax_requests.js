var SearchValue = "";
$(document).ready(function () {
  $("#charitySearching").on("keyup", function () {
    SearchValue = $(this).val().toLowerCase().trim();

    loadCharities();
  });
  loadPendingCharity();
  fetchUserStatus();
  updateCharities();
  loadMyCharity();
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
      console.log(JSON.parse(result));
      var data = JSON.parse(result);
      if (data.length !== 0) {
        // Sort by latest
        data.sort(function (a, b) {
          return new Date(b.datetime) - new Date(a.datetime);
        });

        $("#pendingDescription").text(data[0].description);
        // $("#pendingDatetime").text(data[0].datetime);
        const d = new Date(data[0].datetime);
        $("#pendingDatetime").text(
        d.toLocaleString("en-US", {
              month: "short",
              day: "numeric",
              year: "numeric",
              hour: "numeric",
              minute: "2-digit",
              hour12: true,
            }).replace(",", "")
        );
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
        const d = new Date(data[0].approved_datetime);
        $("#charityDatetime").text(
          "Approved at: " +
            d.toLocaleString("en-US", {
              month: "short",
              day: "numeric",
              year: "numeric",
              hour: "numeric",
              minute: "2-digit",
              hour12: true,
            }).replace(",", "")
        );
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