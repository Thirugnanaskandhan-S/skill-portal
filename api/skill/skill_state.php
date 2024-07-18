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
            isset($_POST['skillId']) &&
            isset($_POST['state'])
        ) {
            extract($_POST);

            $stmt = $db->prepare("UPDATE skill SET skill_status = '$state'  WHERE sk_id = $skillId");

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
