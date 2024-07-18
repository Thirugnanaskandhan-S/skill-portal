<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['skill_id']) && isset($_POST['student_id'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT date,complaint_sub,status  FROM complaint WHERE skill_id = $skill_id AND student_id = $student_id");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $data = array();
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                $res['success'] = true;
                $res['complaint'] = $data;
               
            } else {
                $res['success'] = false;
                $res['message'] = "No Complaint Found";
            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['message'] = "Missing Parameters";
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['message'] = "Backend Error";
    }
} else {
    $res['success'] = false;
    $res['message'] = "Database Error";
}

echo json_encode($res);

$db->close();