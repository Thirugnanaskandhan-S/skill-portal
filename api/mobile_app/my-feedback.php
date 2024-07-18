<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['skill_id']) && isset($_POST['student_id'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT DISTINCT day,date FROM attendence WHERE skill_id = '$skill_id' order by day desc");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $allDays = array();
                $feedback = array();

                while ($row = $result->fetch_assoc()) {
                    $allDays[] = $row;
                }

                $stmt = $db->prepare("SELECT feedback_time FROM skill WHERE sk_id = '$skill_id'");
                $stmt->execute();
                $result = $stmt->get_result();
                $rowTime = $result->fetch_assoc();

                foreach ($allDays as $item) {
                    $stmt = $db->prepare("SELECT day,date FROM feedback WHERE skill_id = '$skill_id' and student_id= $student_id and day=$item[day]");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if (mysqli_num_rows($result) > 0) {
                        $data['date'] = $item['date'];
                        $data['day'] = $item['day'];
                        $data['feedback'] = true;
                    } else {
                        $data['date'] = $item['date'];
                        $data['day'] = $item['day'];
                        $data['feedback'] = false;
                    }
                    array_push($feedback, $data);
                }
                $res['success'] = true;
                $res['feedback_time'] = $rowTime['feedback_time'];
                $res['feedback'] = $feedback;

            } else {
                $res['success'] = false;
                $res['message'] = "No feedback found";
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