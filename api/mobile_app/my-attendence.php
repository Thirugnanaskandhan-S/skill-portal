<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['skill_id']) && isset($_POST['student_id'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT day,date,attendence FROM attendence WHERE student_id = '$student_id' AND skill_id='$skill_id' ORDER BY date desc");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $attendence = array();
                while ($row = $result->fetch_assoc()) {
                    $attendence[] = $row;
                }

                $stmt = $db->prepare("SELECT COUNT(*) FROM attendence WHERE skill_id = $skill_id AND student_id =$student_id AND attendence IN ('1','3')");
                $stmt->execute();
                $result = $stmt->get_result();
                $rowpresent = $result->fetch_assoc();
                if (!is_null($rowpresent['COUNT(*)'])) {
                    $present_od = $rowpresent['COUNT(*)'];
                } else {
                    $present_od = 0;
                }

                $stmt = $db->prepare("SELECT COUNT(*) FROM attendence WHERE skill_id = $skill_id AND student_id =$student_id AND attendence = '2'");
                $stmt->execute();
                $result = $stmt->get_result();
                $rowabsent = $result->fetch_assoc();
                if (!is_null($rowabsent['COUNT(*)'])) {
                    $absent = $rowabsent['COUNT(*)'];
                } else {
                    $absent = 0;
                }

                $total = $present_od + $absent;
                $percentage = $present_od / $total * 100;

                $res['success'] = true;
                $res['present_od'] = $present_od;
                $res['absent'] = $absent;
                $res['percentage'] = number_format($percentage, 0);
                $res['attendence'] = $attendence;
            } else {
                $res['success'] = false;
                $res['message'] = "No Record";
            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['message'] = "Missing Parameter";
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