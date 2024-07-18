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
            $stmt = $db->prepare("SELECT c.id,s.name,s.roll_no,s.year,s.email,sk.skill_name,sk.skill_cat,f.f_name,f.f_id,c.date,c.complaint_sub,c.complaint_des,c.status FROM complaint c INNER JOIN students s ON c.student_id=s.s_id INNER JOIN skill sk ON sk.sk_id=c.skill_id INNER JOIN faculty f ON f.fid = sk.incharge_staff WHERE c.id = ?");
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