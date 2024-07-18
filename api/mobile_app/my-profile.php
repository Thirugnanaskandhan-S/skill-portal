<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['roll_no'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT name,roll_no,email,dept_name FROM students s INNER JOIN department d ON s.dept=d.id WHERE roll_no = '$roll_no'");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {

                while ($row = $result->fetch_assoc()) {
                    $profile = $row;
                }
                $res['success'] = true;
                $res['profile'] = $profile;
                $stmt = $db->prepare("SELECT sk.sk_id,sk.skill_name,sk.final_task_mark,sk.final_ass_date FROM registered_course r INNER JOIN students s ON r.student_id = s.s_id INNER JOIN skill sk ON r.skill_id=sk.sk_id WHERE s.roll_no ='$roll_no' and r.status='0'");
                $stmt->execute();
                $result = $stmt->get_result();


                if (mysqli_num_rows($result) > 0) {
                    $course = array();
                    $course_details = array();
                    while ($row = $result->fetch_assoc()) {
                        $course[] = $row;
                    }

                    foreach ($course as $item) {
                        $stmt = $db->prepare("SELECT mark FROM mark m INNER JOIN students s ON m.student_id = s.s_id WHERE skill_id = $item[sk_id] AND DATE = '$item[final_ass_date]' AND roll_no = '$roll_no'");
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $rowMark = $result->fetch_assoc();
                        $percentage = $rowMark['mark'] / $item['final_task_mark'] * 100;
                        $data['skill_name'] = $item['skill_name'];
                        $data['percentage'] = $percentage;
                        array_push($course_details, $data);
                    }

                    $res['success_course'] = true;
                    $res['courses'] = $course_details;
                } else {
                    $res['success_course'] = false;
                    $res['message'] = "No Course Completed";
                }

            } else {
                $res['success'] = false;
                $res['message'] = "No Student Found";
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