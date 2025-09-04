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

function loadDonators (charityId){
  $.ajax({
    url: "/Shanty-Dope-Proj/CareToFund/loadDonators",
    method: "GET",
    data: { charity_id: charityId },
    success: function (result) {
      $("#donatorsModalContainer").empty();
      $("#donatorsModalContainer").html(result);

      var donatorsModal = new bootstrap.Modal(document.getElementById('donatorsModal'));
      donatorsModal.show();
    },
    error: function (error) {
      alert("Something went wrong.");
    },
  });
}
