<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
$res = array();
$data = array();

if ($db) {
    try {

        if (
            isset($_POST['skill_id']) && isset($_POST['student_id'])
        ) {
            extract($_POST);


            $stmt = $db->prepare("INSERT INTO `registered_course`(`skill_id`, `student_id`) VALUES (?,?)");
            $stmt->bind_param('ii', $skill_id, $student_id);

            $stmt->execute();

            if ($stmt->error) {
                $res['success'] = false;
                $res['message'] = 'Error: ' . $stmt->error;
            } else {
                $res['success'] = true;
                $res['message'] = 'Submitted successfully';
            }
            $stmt->close();

        } else {
            $res['success'] = false;
            $res['message'] = 'Missing Values';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['message'] = 'Backend Error';
    }
} else {
    $res['success'] = false;
    $res['message'] = 'Database Error';
}

echo json_encode($res);