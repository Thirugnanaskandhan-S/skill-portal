<?php

include '../db/connection.php';

$db = db();
$res = array();

if ($db) {
    try {
        if (isset($_POST['roll_no'])) {
            extract($_POST);

            $stmt = $db->prepare("SELECT sk.sk_id,sk.skill_name,r.status,sk.skill_cat,sk.skill_days,c.cat_name FROM registered_course r INNER JOIN students s ON r.student_id = s.s_id INNER JOIN skill sk ON r.skill_id=sk.sk_id inner join skill_cat c on sk.skill_cat = c.id WHERE s.roll_no ='$roll_no'");
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                $course = array();
                $course_details = array();
                while ($row = $result->fetch_assoc()) {
                    $course[] = $row;
                }

                foreach ($course as $item) {
                    $stmt = $db->prepare("SELECT MAX(DAY) FROM attendence WHERE skill_id = $item[sk_id]");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $rowDay = $result->fetch_assoc();
                    if (!is_null($rowDay['MAX(DAY)'])) {
                        $percentage = $rowDay['MAX(DAY)'] / $item['skill_days'];
                        $maxDay = $rowDay['MAX(DAY)'];
                    }else{
                        $percentage = 0.01;
                        $maxDay = 0;
                    }
                    $data['sk_id'] = $item['sk_id'];
                    $data['skill_name'] = $item['skill_name'];
                    $data['status'] = $item['status'];
                    $data['skill_cat'] = $item['skill_cat'];
                    $data['cat_name'] = $item['cat_name'];
                    $data['total_day'] = $item['skill_days'];
                    $data['day'] = $maxDay;
                    $data['percentage'] = $percentage;
                    $course_details[] = $data;
                }

                $res['success'] = true;
                $res['courses'] = $course_details;
            } else {
                $res['success'] = false;
                $res['message'] = 'No course Registered';
            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['message'] = 'Missing Parameter';
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