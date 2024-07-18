<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
if ($db) {
    try {

        extract($_POST);

        if ($status == '1') {
            $stmt = $db->prepare("update skill_master set status = '1',skill_code=? where id =?");
            $stmt->bind_param('si', $skill_code, $id);
        } elseif ($status == '2') {
            $stmt = $db->prepare("update skill_master set status = '2',skill_code=? where id =?");
            $stmt->bind_param('si', $skill_code, $id);
        }

        $stmt->execute();

        if ($stmt->error) {
            $res['success'] = false;
            $res['error'] = 'Error: ' . $stmt->error;
        } else {
            $res['success'] = true;
            $res['msg'] = 'Submitted successfully';
        }
        $stmt->close();

    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}
echo json_encode($res);