<div class="container d-none charityRequestTemplate" >
    <div class="container bg-light my-3 px-4 py-2 shadow-sm d-flex align-items-center flex-column" style=" border-radius: 12px; ">
        <div class="d-flex gap-2 w-100 justify-content-between py-2" style="border-bottom: 4px solid #1b3c53;">
            <div class="d-flex gap-3 align-items-center">
                <p class="m-0 fs-5 fw-bold requestTitle" id="charityRequestTitle" style="color: #1b3c53;"></p>
            </div>
            <div class="d-flex align-items-center gap-0 requestAction"></div>
        </div>  
        <div class="container mt-2 p-0">
            <p class="text-dark fs-6 m-0 requestDescription"></p>
            <p class="m-0 requestDatetime" style="font-size: 0.9rem; color: #848484ff;"></p>
            <p class="m-0 py-3 text-decoration-underline requestViewDetails" 
                style="cursor: pointer; color: #1b3c53; font-size: 0.9rem; width: fit-content;"
                data-bs-toggle="modal" 
                data-bs-target="#requestDetailsModal" >
                View More
            </p>
        </div>
        <div class="container pb-3 px-0 d-flex flex-wrap  align-items-center gap-4 justify-content-start">
            <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2 requestGoal" style="color: #1b3c53;"></p>
            <p class=" m-0 fs-6 fw-bold d-flex align-items-center gap-2 requestDuration" style="color: #1b3c53;"></p>
            <p class="m-0 ms-0 ms-sm-auto text-white px-3 status-badge" style="border-radius: 10px; width: fit-content;"></p>
        </div>
</div>