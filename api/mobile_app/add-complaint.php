<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {

        if (
            isset($_POST['skill_id']) && isset($_POST['student_id']) &&
            isset($_POST['date']) && isset($_POST['complaint_sub']) &&
            isset($_POST['complaint_des'])
        ) {
            extract($_POST);

            $stmt = $db->prepare("INSERT INTO complaint(skill_id, student_id, date,complaint_sub,complaint_des) VALUES (?,?,?,?,?)");
            // $stmt = $db->prepare("INSERT INTO complaint('skill_id', 'student_id', 'date','complaint_sub','complaint_des') VALUES ($skill_id,$student_id,'$date','$complaint_sub','$complaint_des')");
            $stmt->bind_param('iisss', $skill_id, $student_id, $date, $complaint_sub, $complaint_des);
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
    $res['success'] = false;
    $res['error'] = 'Database Error';
}

echo json_encode($res);