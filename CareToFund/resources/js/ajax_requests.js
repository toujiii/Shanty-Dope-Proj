$(document).ready(function() {
    loadPendingCharity();
    fetchUserStatus();
    viewCharityRequests();
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
                loadPendingCharity();
                fetchUserStatus();
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

            // Sort by latest
            data.sort(function(a, b) {
                return new Date(b.datetime) - new Date(a.datetime);
            });

            $("#pendingDescription").text(data[0].description);
            $("#pendingDatetime").text(data[0].datetime);
            $("#pendingFundLimit").text(data[0].fund_limit);
            $("#pendingDuration").text(data[0].duration);

        },
        error: function(error){
            alert('Something went Wrong.');
        }
    });
}

function fetchUserStatus(){
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/fetchUserStatus",
        method: "GET",
        success: function(result){
            console.log(JSON.parse(result));
            var data = JSON.parse(result);
            if(data[0].status === "Pending") {
                $("#newCharityCard").hide();
                $("#idPendingCharity").show();
                $("#myCharityCard").hide();

                // User is pending
            } else if(data[0].status === "Offline") {
                $("#newCharityCard").show();
                $("#idPendingCharity").hide();
                $("#myCharityCard").hide();
                // User is offline
            } else if(data[0].status === "Active") {
                $("#newCharityCard").hide();
                $("#idPendingCharity").hide();
                $("#myCharityCard").show();
                // User is active
            }

        },
        error: function(error){
            alert('Something went Wrong.');
        }
    });
}

function viewCharityRequests() {
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/viewCharityRequests",
        method: "GET",
        success: function(result){
            console.log(JSON.parse(result));
            var datas = JSON.parse(result);
            var charityRequestsHTML = '';

            datas.sort(function(a, b) {
                if (a.request_status === "Pending" && b.request_status !== "Pending") return -1;
                if (a.request_status !== "Pending" && b.request_status === "Pending") return 1;
                return 0;
            });

            datas.reverse();

            datas.forEach(function(data) {
                charityRequestsHTML += `
                    <div class="container " >
                        <div class="container bg-light my-3 px-4 py-2 shadow-sm d-flex align-items-center flex-column" style=" border-radius: 12px; ">
                            <div class="d-flex gap-2 w-100 justify-content-between py-2" style="border-bottom: 4px solid #1b3c53;">
                                <div class="d-flex gap-3 align-items-center">
                                    <p class="m-0 fs-5 fw-bold" style="color: #1b3c53;">
                                    `;
                                    if(data.request_status === "Pending") {
                                        charityRequestsHTML += `
                                            ${data.name} is requesting a new charity.
                                        `;
                                    } else {
                                        charityRequestsHTML += `
                                            ${data.name} charity request.
                                        `;
                                    }
                charityRequestsHTML += `
                                    </p>
                                </div>
                                `;

                                if(data.request_status === "Pending") {
                                    charityRequestsHTML += `
                                        <div class="d-flex align-items-center gap-0">
                                            <button class="btn btn-success px-2 py-0" style="border-radius: 10px; font-size: 0.9rem; color: white;" 
                                                data-bs-toggle="modal" data-bs-target="#admin_request_approval" 
                                                data-request-id="${data.request_id}"
                                                data-user-id="${data.user_id}"
                                            >
                                                <i class="bi bi-check2 fs-5"></i>
                                            </button>
                                            <button class="btn btn-danger px-2 py-0 ms-2" style="border-radius: 10px; font-size: 0.9rem; color: white;"
                                                data-bs-toggle="modal" data-bs-target="#admin_request_rejection" 
                                                data-request-id="${data.request_id}"
                                                data-user-id="${data.user_id}"
                                            >
                                                <i class="bi bi-x-lg fs-5 "></i>
                                            </button> 
                                        </div>
                                    `;
                                }
                charityRequestsHTML += `
                            </div>
                            <div class="container mt-2 p-0">
                                <p class="text-dark fs-6 m-0">
                                    ${data.description}
                                </p>
                                <p class="m-0 " style="font-size: 0.9rem; color: #848484ff;">
                                    ${data.datetime}
                                </p>
                                <p class="m-0 py-3 text-decoration-underline" style="cursor: pointer; color: #1b3c53; font-size: 0.9rem; width: fit-content;"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#requestDetailsModal" 
                                    onclick="getCharityRequestDetails(${data.request_id}, ${data.user_id})"
                                >
                                    View More
                                </p>
                                
                            </div>
                            <div class="container pb-3 px-0 d-flex flex-wrap  align-items-center gap-4 justify-content-start">
                                <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2" style="color: #1b3c53;">
                                    <i class="bi bi-flag-fill fs-5"></i>
                                    ₱ ${data.fund_limit}.00
                                </p>
                                <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2" style="color: #1b3c53;">
                                    <i class="bi bi-stopwatch-fill fs-5"></i>
                                    ${data.duration} Days
                                </p>
                            `;
                            if(data.request_status === "Approved") {
                                charityRequestsHTML += `
                                    <p class="m-0 ms-0 ms-sm-auto text-white bg-success px-3" style="border-radius: 10px; width: fit-content;">
                                        Approved
                                    </p>
                                `;
                            } else if(data.request_status === "Pending") {
                                charityRequestsHTML += `
                                    <p class="m-0 ms-0 ms-sm-auto text-white bg-warning px-3" style="border-radius: 10px; width: fit-content;">
                                        Pending
                                    </p>
                                `;
                            } else if(data.request_status === "Rejected") {
                                charityRequestsHTML += `
                                    <p class="m-0 ms-0 ms-sm-auto text-white  bg-danger px-3" style="border-radius: 10px; width: fit-content;">
                                        Rejected
                                    </p>
                                `;
                            }    
                            charityRequestsHTML += `
                            </div>
                        </div>
                    </div>
                `;
            });
            $("#charityRequestsContainer").html(charityRequestsHTML);
        },
        error: function(error){
            alert('Something went Wrong.');
        }
    });
}

function charityApprovalRequest() {
    var requestId = $('#admin_request_approval').data('request-id');
    var userId = $('#admin_request_approval').data('user-id');
    console.log(userId);

    console.log(requestId);
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/approveCharityRequest",
        method: "POST",
        data: {
            request_id: requestId,
            user_id: userId
        },
        success: function(response) {
            viewCharityRequests();
            fetchUserStatus();
        },
        error: function(error) {

            alert('Something went wrong.');
        }
    });
}

function charityRejectionRequest() {
    var requestId = $('#admin_request_rejection').data('request-id');
    var userId = $('#admin_request_rejection').data('user-id');

    console.log(requestId);
    console.log(userId);

    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/rejectCharityRequest",
        method: "POST",
        data: {
            request_id: requestId,
            user_id: userId
        },
        success: function(response) {
            viewCharityRequests();
        },
        error: function(error) {

            alert('Something went wrong.');
        }
    });
}

function getCharityRequestDetails(requestId, userId) {
    console.log(requestId);
    console.log(userId);
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/getCharityRequestDetails",
        method: "POST",
        data: {
            request_id: requestId,
            user_id: userId
        },
        success: function(result) {
            var data = JSON.parse(result);
            console.log('Charity details:', data);

            $('#request_id_details').text(data[0].request_id);
            $('#id_type_used_details').text(data[0].id_type_used);
            $('#id_number_details').text(data[0].id_number);
            $('#id_image_details').attr('src', '/Shanty-Dope-Proj/CareToFund/' + data[0].id_att_link);
            $('#front_face_image_details').attr('src', '/Shanty-Dope-Proj/CareToFund/' + data[0].front_face_link);
            $('#side_face_image_details').attr('src', '/Shanty-Dope-Proj/CareToFund/' + data[0].side_face_link);
        },
        error: function(error) {
            alert('Something went wrong.');
        }
    });

}