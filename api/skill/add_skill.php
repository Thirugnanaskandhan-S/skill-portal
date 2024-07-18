<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
$res = array();
$data = array();

if ($db) {
    try {


        if (
            isset($_POST['skillMaster']) && isset($_POST['skillName']) &&isset($_POST['skillCode']) && isset($_POST['skillDes']) && isset($_POST['skillCat']) && isset($_POST['skillYear'])
            && isset($_POST['skillDays']) && isset($_POST['skillDept']) && isset($_POST['skillStartingDate']) && isset($_POST['skillEndingDate']) 
            && isset($_POST['skillMaxRP']) && isset($_POST['skillMinAttendence']) 
            && isset($_POST['skillFinalTaskDate']) && isset($_POST['skillFinalTaskMark']) && isset($_POST['skillDailyTaskMark']) 
            && isset($_POST['skillFeedbackTime']) 
            && isset($_POST['skillMarkTime']) 
            && isset($_POST['skillStartingTime'])
             && isset($_POST['skillEndingTime']) 
        ) {
            extract($_POST);

                
                        $stmt = $db->prepare("INSERT INTO `skill`(`master_id`,`skill_name`, `skill_code`, `skill_des`, `skill_cat`, `skill_year`, `skill_days`, 
                                                    `skill_dept`, `starting_date`, `ending_date`,`max_rp`, 
                                                    `min_attendence`,`final_ass_date`,`final_task_mark`,`daily_task_mark`,feedback_time,mark_time,starting_time,ending_time) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                        $stmt->bind_param('isssssisssiisiissss',$skillMaster,$skillName,$skillCode, $skillDes, $skillCat,$skillYear, $skillDays, $skillDept, $skillStartingDate, $skillEndingDate, $skillMaxRP, $skillMinAttendence,$skillFinalTaskDate,$skillFinalTaskMark,$skillDailyTaskMark,$skillFeedbackTime,$skillMarkTime,$skillStartingTime,$skillEndingTime);

                        $stmt->execute();

                        if ($stmt->error) {
                            $res['success'] = false;    
                            $res['error'] = 'Error: ' . $stmt->error;
                        } else {
                            $res['success'] = true;
                            $res['msg'] = 'Submitted successfully';
                        }
                        $stmt->close();
                   
                
        } else {
            $res['success'] = false;
            $res['error'] = 'Missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}

echo json_encode($res);