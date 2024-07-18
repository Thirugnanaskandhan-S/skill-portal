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
        if (isset($_REQUEST['skill_code']) && !empty($_REQUEST['student_id'])) {
            extract($_REQUEST);
            $stmt = $db->prepare("SELECT skill.skill_code FROM registered_course INNER JOIN skill ON skill.sk_id = registered_course.skill_id WHERE student_id = ?");
            $stmt->bind_param('i', $student_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $course = array();
                while ($row = $result->fetch_assoc()) {
                    $course[] = $row;
                }
                foreach ($course as $code) {
                    if ($skill_code == $code['skill_code']) {
                        $res['success'] = true;
                        $res['eligble'] = false;
                        break;
                    }
                    $res['success'] = true;
                    $res['eligble'] = true;
                }
            } else {
                $res['success'] = true;
                $res['eligble'] = true;

            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['message'] = 'missing parameters';
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
$db->close();