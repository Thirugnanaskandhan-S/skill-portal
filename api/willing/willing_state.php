<?php
session_start(); 
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
            isset($_POST['skill_id'])

        ) {
            extract($_POST);

            $fid = $_SESSION['fid'];


            $stmt = $db->prepare("INSERT INTO `willingness`(`skill_id`,`faculty_id`,count) VALUES (?,?,?)");
            $stmt->bind_param('iii', $skill_id,$fid,$count);

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
            $res['error'] = 'Missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}

echo json_encode($res);