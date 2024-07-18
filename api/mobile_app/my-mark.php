<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['skill_id']) && isset($_POST['student_id'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT skill_day,date,mark,max_mark FROM mark WHERE skill_id = '$skill_id' AND student_id ='$student_id' ORDER BY date desc");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $mark = array();
                while ($row = $result->fetch_assoc()) {
                    $mark[] = $row;
                }

                $stmt = $db->prepare("SELECT MIN(mark),MAX(mark), SUM(mark) FROM mark WHERE skill_id = $skill_id AND student_id = $student_id");
                $stmt->execute();
                $result = $stmt->get_result();
                $rowMarks = $result->fetch_assoc();

                $minMark = $rowMarks['MIN(mark)'];
                $maxMark = $rowMarks['MAX(mark)'];
                $totalMark = $rowMarks['SUM(mark)'];

                $res['success'] = true;
                $res['min_mark'] = $minMark;
                $res['max_mark'] = $maxMark;
                $res['total_mark'] = $totalMark;
                $res['marks'] = $mark;
            } else {
                $res['success'] = false;
                $res['message'] = "No mark Found";
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