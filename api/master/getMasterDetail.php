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
            $stmt = $db->prepare("SELECT m.skill_name,m.skill_des,m.doc_file,m.status,m.skill_code from skill_master m where m.id=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
            $res['success'] = true;
            $res['data'] = $data;
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['error'] = 'missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = 'Error: ' . $ex->__toString();
    }
} else {
    $res['success'] = false;
        $res['error'] = 'Error:';
}

echo json_encode($res);
$db->close();