<?php
require "db/db.php";
$mydb = new myDB();
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];
} else {
    echo "No student ID provided!";
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
</head>
<body>
    <h1>Are you sure to delete this data?</h1>
    <form method="post" action="db/request.php" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $student_id; ?>">
        <button type="submit" name="delete_student">Delete</button>
        <a href="index.php"><button type="button">Cancel</button></a>
    </form>
</body>
</html>