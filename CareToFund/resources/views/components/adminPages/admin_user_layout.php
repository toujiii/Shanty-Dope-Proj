<?php
$var = 'Active';
?>
<div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
    <h2 class="fs-5 fw-bold m-0" style="color: #545454;">User Managment</h2>
    <div class="d-flex gap-3 ms-auto mt-2 mt-md-0 flex-column flex-sm-row">
        <input id="userSearch" type="text" class="form-control fs-6 m-0 py-0 px-2" placeholder="Search..." style="height: 30px; border-radius: 7px; border: 2px solid #1b3c53; padding-left: 15px; padding-right: 15px;">
    </div>
</div>

<div class="container my-3">
    <div class="bg-light shadow-sm p-4 py-1" style="border-radius: 12px; min-height: fit-content;">
        <div class="table-responsive my-3 " style="overflow-x: auto; border-radius: 12px; overflow: hidden; min-height: 700px;">
            <table class="table m-0 table-hover align-middle" style="min-width: 900px;">
                <thead class="table-light">
                    <tr style="border-bottom: 2px solid #1b3c53; ">
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">GCash</th>
                        <th scope="col">Password</th>
                        <th scope="col">Charity Status</th>
                        <th scope="col" class="action-col">Action</th>
                    </tr>
                </thead>
                <tbody id="usersContainer"></tbody>
            </table>
            
        </div>
        <div id="userPagination" class="d-flex align-items-center justify-content-center my-3"></div>
    </div>
</div>

<?php include __DIR__ . '/admin_user_delete_modal.php'; ?>
<?php include __DIR__ . '/admin_user_edit_modal.php'; ?>