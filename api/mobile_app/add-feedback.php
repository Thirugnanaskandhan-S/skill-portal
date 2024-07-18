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
            isset($_POST['skill_id']) && isset($_POST['student_id']) &&
            isset($_POST['date']) && isset($_POST['day']) && isset($_POST['answer1']) &&
            isset($_POST['answer2']) && isset($_POST['answer3'])
        ) {
            extract($_POST);


            $stmt = $db->prepare("INSERT INTO feedback(skill_id, student_id, date,day,is_skill_usefull,trainers_skilled,trainings_done) VALUES (?,?,?,?,?,?,?)");
            $stmt->bind_param('iisisss', $skill_id, $student_id, $date, $day, $answer1, $answer2, $answer3);

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
        $res['message'] = "Backend Error";
    }
} else {
    $res['success'] = false;
    $res['message'] = "Database Error";
}

echo json_encode($res);