<?php
    require "db.php";
    $mydb = new myDB();

    if(isset($_POST['add_student'])){
        unset($_POST['add_student']);
        $mydb->insert('tbl_students', $_POST);
    }

    if(isset($_POST['get_students'])){
        if(isset($_POST['id'])){
            $student_id = $_POST['id'];
            $mydb->select('tbl_students', '*', ['id' => $student_id]);
            $student = $mydb->res->fetch_assoc();
            echo json_encode($student);
            exit();
        }else{
            $mydb->select('tbl_students', '*');
            $datas = [];
            while($row = $mydb->res->fetch_assoc()){
                array_push($datas, $row);
            }
            echo json_encode($datas);
        }
        
    }

    if(isset($_POST['delete_student'])){
        $student_id = $_POST['id'];
        $mydb->delete('tbl_students', ['id' => $student_id]);

        $mydb->select('tbl_students', '*', ['id' => $student_id]);

        if($mydb->res->num_rows <= 0){
            echo "success";
            exit();
        }
    }

    if(isset($_POST['update_student'])){
        unset($_POST['update_student']);
        $mydb->update('tbl_students',$_POST, ['id' => $_POST['id']]);
    }
?>