<?php
    require "db/db.php";
    $mydb = new myDB();
    
    if(isset($_GET['id'])){
        $student_id = $_GET['id'];
        $mydb->select('tbl_students', '*', ['id' => $student_id]);
        $student = mysqli_fetch_assoc($mydb->res);
        
        if(!$student){
            die("Student not found!");
        }
    } else {
        die("No student ID provided!");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>
    <h2>Update Student</h2>
    <form method="post" action="db/request.php">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>"
        <label>Full Name:</label><br>
        <input type="text" name="full_name" value="<?php echo htmlspecialchars($student['full_name']); ?>" ><br><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" ><br><br>
        <label>Course Year & Section:</label><br>
        <input type="text" name="course_year_section" value="<?php echo htmlspecialchars($student['course_year_section']); ?>" ><br><br>
        <button type="submit" name="update_student">Update Student</button>
        <a href="index.php"><button type="button">Cancel</button></a>
    </form>
</body>
</html>
