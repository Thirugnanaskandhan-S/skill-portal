<?php
session_start(); 
header("Access-Control-Allow-Origin: *");
include '../db/connection.php';


    $username = $_POST['username'];
    $password = $_POST['password'];

        $checkSql = "SELECT * FROM faculty_login INNER JOIN user_role ON faculty_login.user_role=user_role.id INNER JOIN faculty ON faculty_login.faculty_id=faculty.fid  WHERE username ='$username' AND faculty_login.status='1' AND user_role.status='1'";
        $checkResult = mysqli_query($db, $checkSql);

        if ($checkResult->num_rows > 0) {
            $row = $checkResult->fetch_assoc();

            if ($row["password"] == md5(md5(md5($password)))) {
                $_SESSION['f_name'] = $row['f_name'];
            	$_SESSION['user_role'] = $row['user_role'];
                $_SESSION['fid']=$row['fid'];
            	$_SESSION['f_id'] = $row['f_id'];
            	$_SESSION['role_name'] = $row['role_name'];
            	$_SESSION['add_course'] = $row['add_course'];
            	$_SESSION['edit_course'] = $row['edit_course'];
            	$_SESSION['non_active_course'] = $row['non_active'];
            	$_SESSION['all_course'] = $row['all_course'];
            	$_SESSION['all_complaints'] = $row['all_complaints'];
            	$_SESSION['add_attendence'] = $row['add_attendence'];
            	$_SESSION['edit_attendence'] = $row['edit_attendence'];
            	$_SESSION['all_attendence'] = $row['all_attendence'];
            	$_SESSION['all_feedback'] = $row['all_feedback'];
            	$_SESSION['all_mark'] = $row['all_mark'];
            	$_SESSION['add_mark'] = $row['add_mark'];
            	$_SESSION['feedback'] = $row['feedback'];
            	$_SESSION['students_details'] = $row['students_detials'];
            	$_SESSION['willing_ness'] = $row['willing_ness'];
            	$_SESSION['approve_master'] = $row['approve_master'];
            	$_SESSION['course_faculty'] = $row['course_faculty'];
                header("Location: ../../index.php");
		        exit();
                
            } else {
                header("Location: ../../login.php?error=Invalid Password");
                exit();
            }
        } else {
            header("Location: ../../login.php?error=Invalid User");
	    exit();
        }

       echo json_encode($data); 
