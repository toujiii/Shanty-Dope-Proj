var requestSearchValue = '';

$(document).ready(function() {
    loadPendingCharity();
    fetchUserStatus();

    $('#requestCharitySearch').on('keyup', function() {
        requestSearchValue = $(this).val().toLowerCase().trim();

        viewCharityRequests();

        // if($(this).val().length > 0) {
            
        // } else {
            
        // }
    });
    viewCharityRequests();
    loadMyCharity();

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
        url: "/Shanty-Dope-Proj/CareToFund/loadPendingCharity",
        method: "GET",
        success: function(result){
            console.log(JSON.parse(result));
            var data = JSON.parse(result);
            if(data.length !== 0) {

                // Sort by latest
                data.sort(function(a, b) {
                    return new Date(b.datetime) - new Date(a.datetime);
                });

                $("#pendingDescription").text(data[0].description);
                $("#pendingDatetime").text(data[0].datetime);
                $("#pendingFundLimit").text(data[0].fund_limit);
                $("#pendingDuration").text(data[0].duration);
            }

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

let currentSorting = '';
function viewCharityRequests(sorting) {
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/viewCharityRequests",
        method: "GET",
        success: function(result){
            console.log(JSON.parse(result));
            var datas = JSON.parse(result);
            var charityRequestsHTML = '';

            // Separate pending and non-pending
            var pendings = datas.filter(d => d.request_status === "Pending");
            var others = datas.filter(d => d.request_status !== "Pending");

            // (Optional) Sort pendings by latest if you want
            pendings.sort(function(a, b) {
                return new Date(b.datetime) - new Date(a.datetime);
            });

            // Sort others by latest
            others.sort(function(a, b) {
                return new Date(b.datetime) - new Date(a.datetime);
            });

            // Button mapping
            const btns = {
                Pending: "#pendingRequestsBtn",
                Approved: "#approvedRequestsBtn",
                Rejected: "#rejectedRequestsBtn"
            };

            const btnClasses = {
                Pending: "btn-yellow",
                Approved: "btn-green",
                Rejected: "btn-red"
            };

            // Toggle sorting: if same as current, reset
            if (sorting === currentSorting) {
                sorting = null;
                currentSorting = null;
            } else {
                currentSorting = sorting;
            }

            // Reset all buttons
            Object.values(btns).forEach(btn => {
                $(btn).removeClass("btn-yellow btn-green btn-red").addClass("btn-cool");
            });

            // Set active button
            if (sorting && btns[sorting]) {
                $(btns[sorting]).addClass(btnClasses[sorting]).removeClass("btn-cool");
            }

            // Sort data
            let sortedDatas;
            if (!sorting) {
                sortedDatas = pendings.concat(others);
            } else if (sorting === "Pending") {
                sortedDatas = pendings;
            } else {
                sortedDatas = others.filter(d => d.request_status === sorting);
            }

            filteredDatas = sortedDatas.filter(
                requestCharity => {
                    return Object.values(requestCharity).some(value => String(value).toLowerCase().includes(requestSearchValue));
                }
            )

            filteredDatas.forEach(function(data) {
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
                                    ₱ ${Number(data.fund_limit).toLocaleString()}.00
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
            loadMyCharity(response);
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

function loadMyCharity() {
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/loadMyCharity",
        method: "GET",
        success: function(result) {
            var data = JSON.parse(result);
            if(data.length === 0) {
                console.log('No charity details found.');
                 console.log('My charity details:', data);

                $("#charityDescription").text(data[0].description);
                $("#charityDatetime").text('Approved at: ' + data[0].approved_datetime);
                $("#charityRaised").text(`₱ ${Number(data[0].raised).toLocaleString()}.00`);
                $("#charityFundLimit").text(`₱ ${Number(data[0].fund_limit).toLocaleString()}.00`);
                // $("#charityDuration").text(data[0].duration);
                startCharityCountdown(data[0].approved_datetime, data[0].duration, "#charityDuration", data[0].charity_id);
                $("#charityProgress").css("width", `${data[0].raised / data[0].fund_limit * 100}%`).attr("aria-valuenow", data[0].raised / data[0].fund_limit * 100);
                
                    return;
            }
        },
        error: function(error) {
            alert('Something went wrong.');
        }
    });
}

function startCharityCountdown(startDatetime, durationDays, selector, charityId) {
    let timer; // Declare timer in the parent scope

    function updateCountdown() {
        const start = new Date(startDatetime);
        const end = new Date(start.getTime() + durationDays * 24 * 60 * 60 * 1000);
        const now = new Date();
        const diff = end - now;

        if (diff <= 0) {
            $(selector).text("Ended");
            clearInterval(timer);
            updateMyCharity(charityId);
            return;
        }

        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((diff / (1000 * 60)) % 60);
        const seconds = Math.floor((diff / 1000) % 60);

        $(selector).text(
            `${days ? days + 'd ' : ''}` +
            `${hours ? hours + 'h ' : ''}` +
            `${minutes ? minutes + 'm ' : ''}` +
            `${seconds ? seconds + 's ' : ''}left...`
        );
    }

    updateCountdown();
    timer = setInterval(updateCountdown, 1000); // Assign after function definition
}

function updateMyCharity(charityId) {
    $.ajax({
        url: "/Shanty-Dope-Proj/CareToFund/updateMyCharity",
        method: "POST",
        data: {
            charity_id: charityId
        },
        success: function(result) {
           console.log('Charity updated successfully');

        },
        error: function(error) {
            alert('Something went wrong.');
        }
    });
}