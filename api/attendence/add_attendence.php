<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include '../db/connection.php';

$db = db();
$res = array();
$data = array();

if ($db) {
    try {

        if (
            isset($_POST['skill_id']) &&isset($_POST['student_id']) && isset($_POST['date']) && isset($_POST['attendence'])
        ) {
            extract($_POST);

                        $sql= "SELECT MAX(DAY) FROM attendence WHERE skill_id =$skill_id and DATE != '$date'";
                        $result = mysqli_query($db,$sql);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['SA']=$row['MAX(DAY)'];
                            if($row['MAX(DAY)']=='(NULL)'){
                                $day = 1;
                            }
                            else{
                                $day = $row['MAX(DAY)']+1;
                            }
                        }else{
                            }

                
                        $stmt = $db->prepare("INSERT INTO `attendence`(`skill_id`, `student_id`, `date`,`day`, `attendence`) VALUES (?,?,?,?,?)");
                        $stmt->bind_param('iisis',$skill_id,$student_id,$date,$day,$attendence);

                        $stmt->execute();

                        if ($stmt->error) {
                            $res['success'] = false;    
                            $res['error'] = 'Error: ' . $stmt->error;
                        } else {
                            $res['success'] = true;
                            $res['msg'] = 'Submitted successfully';
                        }
                        $stmt->close();
                   
                
        } else {
            $res['success'] = false;
            $res['error'] = 'Missing Values';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}

echo json_encode($res);