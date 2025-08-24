<div class="container d-flex justify-content-between align-items-center">
    <h2 class="fs-4 fw-bold m-0" style="color: #545454;">User Management</h2>
</div>


<div class="container mt-3">
    <div class="bg-light shadow-sm p-4 pb-1" style="border-radius: 12px; min-height: fit-content;">
        <input type="text" class="form-control fs-6 p-1 px-2 ms-auto" placeholder="Search..." style="border-radius: 12px; border: 3px solid #1b3c53; width: 200px; padding-left: 15px; padding-right: 15px;">
        <div class="table-responsive my-3" style="overflow-x: auto; border-radius: 12px; overflow: hidden;">
            <table class="table m-0 table-hover align-middle" style="min-width: 900px;">
                <thead class="table-light">
                    <tr style="border-bottom: 3px solid #1b3c53;">
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
                <tbody class="table-light">
                    <tr>
                        <th scope="row">1</th>
                        <td>1001</td>
                        <td>John Doe</td>
                        <td>johndoe@email.com</td>
                        <td>09123456789</td>
                        <td>?SaNASJKDNBS DOI@#@09</td>
                        <td class="text-success">Active</td>
                        <td class="action-col">
                            <button class="btn btn-sm btn-warning text-white" data-bs-toggle="modal" data-bs-target="#admin_user_edit">Edit</button>
                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#admin_user_delete">Delete</button>
                        </td>
                    </tr>
                   
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-center mt-3">
                <ul class="pagination gap-3 m-0  ">
                    <li><i class="bi bi-caret-left-fill"></i></li>
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li><i class="bi bi-caret-right-fill"></i></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/admin_user_delete_modal.php'; ?>
<?php include __DIR__ . '/admin_user_edit_modal.php'; ?>
