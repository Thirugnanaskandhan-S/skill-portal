<?php

include '../db/connection.php';

$db = db();
$res = array();
$cour = array();

if ($db) {
    try {
        if (isset($_POST['skill_dept']) && isset($_POST['skill_year'])) {
            extract($_REQUEST);

            $stmt = $db->prepare("SELECT sk_id,skill_name, starting_date FROM skill WHERE skill_registration = '1' AND skill_year = '$skill_year'");
            $stmt->execute();
            $result = $stmt->get_result();

            if (mysqli_num_rows($result) > 0) {
                $courses = array();
                while ($row = $result->fetch_assoc()) {
                    $courses[] = $row;
                }

                foreach ($courses as $c) {
                    $skill_id = $c['sk_id'];
                    $stmt = $db->prepare("SELECT skill_dept FROM skill WHERE sk_id = '$skill_id'");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $data = mysqli_fetch_assoc($result);
                    $dept_id = array();
                    $dept_id = explode("-", $data['skill_dept']);

                    if (in_array($_POST['skill_dept'], $dept_id)) {
                        array_push($cour, $c);
                    }
                }

                if (count($cour)> 0) {
                    
                    $res['success'] = true;
                    $res['courses'] = $cour;
                }else{
                    $res['success'] = false;
                    $res['message'] = 'No course Available';
                }


            } else {
                $res['success'] = false;
                $res['message'] = 'No course Available';
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
    $res['message'] = 'Database Erorr';
}

echo json_encode($res);

$db->close();