action="/Shanty-Dope-Proj/CareToFund/createCharityProcess"

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

