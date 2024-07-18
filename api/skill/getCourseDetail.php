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


            $stmt = $db->prepare("SELECT incharge_staff FROM skill WHERE sk_id = ?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = mysqli_fetch_assoc($result);
            if ($row['incharge_staff']) {
                $stmt = $db->prepare("SELECT * FROM skill inner join faculty On skill.incharge_staff=faculty.fid inner join skill_cat c on c.id = skill.skill_cat WHERE sk_id = ?");
            } else {
                $stmt = $db->prepare("SELECT * FROM skill inner join skill_cat c on c.id = skill.skill_cat WHERE sk_id = ?");
            }


            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $dept_id = array();
            $dept_id = explode("-", $data['skill_dept']);

            $dept = array();
            foreach ($dept_id as $d) {
                $stmt = $db->prepare("SELECT * FROM department where id = '$d'");
                $stmt->execute();
                $result = $stmt->get_result();
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $dept[] = $row['dept_name'];
                    }
                }
            }

            $res['success'] = true;
            $res['data'] = $data;
            $res['dept'] = $dept;
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