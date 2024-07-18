<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();

if ($db) {
    try {
        $res = array();
        $data = array();
        $alotDetail = array();
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            extract($_POST);
            $stmt = $db->prepare("update complaint set status = '1' where id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            if ($stmt->error) {
                $res['success'] = false;    
                $res['error'] = 'Error: ' . $stmt->error;
            } else {
                $res['success'] = true;
                $res['msg'] = 'Updated successfully';
            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['error'] = 'missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = 'Error: ' . $ex->__toString();
    }
    echo json_encode($res);
} else {
    die('Database error');
}

$db->close();