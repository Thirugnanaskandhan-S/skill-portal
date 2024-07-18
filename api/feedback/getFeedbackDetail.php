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
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
            extract($_REQUEST);
            $stmt = $db->prepare("SELECT * FROM feedback INNER JOIN students ON feedback.student_id=students.s_id INNER JOIN skill ON skill.sk_id=feedback.skill_id INNER JOIN faculty ON faculty.fid = skill.incharge_staff WHERE feedback.id = ?");
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
    echo json_encode($res);
} else {
    die('Database error');
}

$db->close();