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
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
            extract($_REQUEST);
            $stmt = $db->prepare("SELECT * FROM skill inner join department on skill.skill_dept=department.id inner join faculty On skill.incharge_staff=faculty.fid inner join skill_cat c on skill.skill_cat = c.id WHERE sk_id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data = $row;
                }
                $res['success'] = true;
                $res['details'] = $data;
            }else{
                $res['success'] = false;
                $res['message'] = 'No course found';
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