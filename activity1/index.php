<?php
    require "db/db.php";
    $mydb = new myDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" href="css/student-css.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">Student Management System</div>
            <form id="addStudentForm" method="post" action="db/request.php">
                <div class="form-row">
                        <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                        <input type="text" name="course_year_section" class="form-control" placeholder="Course Year & Section" required>
                        <button type="submit" name="add_student" class="btn btn-primary">Add Student</button>
                        <div class="search-container">
                            <input id="search" type="text" class="form-control search-input" placeholder="Search students...">
                            <button type="button" class="clear-search" id="clearSearch">×</button>
                        </div>
                </div>
            </form>
        </div>
        
        <div class="card" style="height: 550px; margin: 0;">
            <div class="card-header" >Students List</div>
                <div class="card-body" style="height: 500px; overflow-y: auto;">
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Course Year & Section</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tBodyStudent">
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>

    <div class="modal" id="editForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Edit Student</div>
                <form id="editStudentForm" method="post" action="db/request.php">
                    <input type="hidden" name="id" value="">
                    
                    <div class="mb-3">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" style="width: 94.3%;">
                    </div>
                    
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" style="width: 94.3%;" >
                    </div>
                    
                    <div class="mb-3">
                        <label>Course Year & Section</label>
                        <input type="text" name="course_year_section" class="form-control" style="width: 94.3%;" >
                    </div>
                    
                    <div style="width: 100%; display: flex; justify-content: flex-end; gap: 10px;">
                        <button type="submit" name="update_student" class="btn btn-primary" style="margin-left: auto;">Update Student</button>
                        <button type="button" class="btn btn-secondary" onclick="$('#editForm').hide();">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript"> 

    var searchValue = "";

    $(document).ready(function(){
        
        $('#search').on('keyup', function() {
            searchValue = $(this).val().toLowerCase().trim();

            loadStudents();

            if($(this).val().length > 0) {
                $('#clearSearch').addClass('show');
            } else {
                $('#clearSearch').removeClass('show');
            }
        });
        
        $('#clearSearch').on('click', function() {
            $('#search').val('');
            searchValue = '';
            loadStudents();
            $(this).removeClass('show');
            $('#search').focus();
        });
        loadStudents();
    })

    function loadStudents() {
        $.ajax({
            url: "db/request.php",
            method: "POST",
            data: {
                "get_students": true,
            },
            success: function(result) {
                var tBody = '';
                var cnt = 1;
                var datas = JSON.parse(result);

                //search ito
                filteredDatas = datas.filter(
                    student => {
                        return Object.values(student).some(value => String(value).toLowerCase().includes(searchValue));
                    }
                )
                filteredDatas.forEach(function(data) {
                    tBody += '<tr>';
                        tBody += `<td>${data["full_name"]}</td>`;
                        tBody += `<td>${data["email"]}</td>`;
                        tBody += `<td>${data["course_year_section"]}</td>`;
                        tBody += `<td>
                            <button class="btn btn-danger" onclick="deleteStudent(${data["id"]})">Delete</button>
                            <button class="btn btn-success" onclick="editStudent(${data["id"]})">Edit</button>
                        </td>`;
                    tBody += '</tr>';
                });
                $("#tBodyStudent").html(tBody);
            },
            error: function(error) {
                alert("Something went wrong")
            }
        });
    }

    function deleteStudent(id) {
        if (confirm("Are you sure you want to delete this student?")) {
            $.ajax({
                url: "db/request.php",
                method: "POST",
                data: {
                    "delete_student": true,
                    "id": id
                },
                success: function(result) {
                    console.log(result);
                    if (result == "success") {
                        loadStudents();
                    } else {
                        alert("Failed to delete student");
                        loadStudents();
                    }
                },
            })
        }
    }

    $("#addStudentForm").on("submit", function(e){
        e.preventDefault();
        var datas = $(this).serializeArray();
        var data_array = {};
        $.map(datas, function(data){
            data_array[data['name']] = data['value'];
        });
        $.ajax({
            url: "db/request.php",
            method: "POST",
            data: {
                "add_student": true,
                ...data_array
            },
            success: function(result){
                loadStudents();
            }, error: function(error){
                alert('Something went Wrong.')
            }
        })
    });

    $("#editStudentForm").on("submit", function(e){
        e.preventDefault();
        var datas = $(this).serializeArray();
        var data_array = {};
        $.map(datas, function(data){
            data_array[data['name']] = data['value'];
        });
        $.ajax({
            url: "db/request.php",
            method: "POST",
            data: {
                "update_student": true,
                ...data_array,
            },
            success: function(result){
                loadStudents();
                $('#editForm').hide();
            }, error: function(error){
                alert('Something went Wrong.')
            }
        })
    })

    function editStudent(id){
        $.ajax({
            url: "db/request.php",
            method: "POST",
            data: {
                "get_students": true,
                "id": id
            },
            success: function(result){
                var student = JSON.parse(result);
                if(!student.error) {
                    $('#editForm input[name="id"]').val(student.id);
                    $('#editForm input[name="full_name"]').val(student.full_name);
                    $('#editForm input[name="email"]').val(student.email);
                    $('#editForm input[name="course_year_section"]').val(student.course_year_section);
                    
                    $('#editForm').show();
                } else {
                    alert('Student not found');
                }
            }
        })

    }

</script>
</html>