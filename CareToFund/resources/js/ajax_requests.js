$(document).ready(function() {
    loadPendingCharity();
});


$("#createCharityForm").on("submit", function(e){
    e.preventDefault();

    var form = this;
    var formData = new FormData(form); 

    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/createCharityProcess",
        method: "POST",
        data: formData,
        processData: false, 
        contentType: false,
        success: function(result){
            if (typeof result === "string") {
                try {
                    result = JSON.parse(result);
                } catch (e) {
                    alert("Unexpected server response.");
                    return;
                }
            }

            if(result.success) {
                var createCharityModal = bootstrap.Modal.getInstance(document.getElementById('createCharityModal'));
                if(createCharityModal) createCharityModal.hide();

                var charityCreatedModal = new bootstrap.Modal(document.getElementById('charity_created'));
                charityCreatedModal.show();
            } else {
                alert(result.message || "Something went wrong.");
            }
        },
        error: function(error){
            alert('Something went Wrong.');
        }
    });
});

function loadPendingCharity(){
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/viewPendingCharity",
        method: "GET",
        success: function(result){


            console.log(JSON.parse(result));
            var data = JSON.parse(result);
            var pendingCharitiesHTML = `
                <div class="container my-3 px-4 d-flex flex-column justify-content-center shadow" style="background: linear-gradient(to right, #88afcd,#6da0c6, #456882);  border-radius: 12px;">
                    <div class="container d-flex justify-content-between align-items-center py-3 border-bottom border-4 border-light">
                        <p class="m-0 text-white fs-4 fw-bold" >
                            Pending for Approval...
                        </p>
                        <button class="btn btn-danger px-4 py-2" 
                                style="border-radius: 15px; font-size: 0.9rem;"
                                data-bs-toggle="modal" 
                                data-bs-target="#abortCharityModal">
                            Abort Charity
                        </button>

                    </div>
                    <div class="container">
                        <p class="m-0 text-white fs-6 pt-2">
                            ${data[0].description}
                        </p>
                        <p class="m-0 pb-3 text-white" style="font-size: 0.9rem;">
                            ${data[0].datetime}
                        </p>
                    </div>
                    <div class="container pb-3 d-flex align-items-center gap-4">
                        <p class="text-white m-0 fs-6 fw-bold d-flex align-items-center gap-2">
                            <i class="bi bi-flag-fill fs-5"></i>
                            ${data[0]["fund_limit"]}
                        </p>
                        <p class="text-white m-0 fs-6 fw-bold d-flex align-items-center gap-2">
                            <i class="bi bi-stopwatch-fill fs-5"></i>
                            ${data[0]["duration"]} Days
                        </p>
                    </div>
                </div>
            `;
            $("#idPendingCharity").html(pendingCharitiesHTML);

        },
        error: function(error){
            alert('Something went Wrong.');
        }
    });
}

