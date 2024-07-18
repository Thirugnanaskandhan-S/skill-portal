<?php  
//action.php
include '../db/connection.php';
include '../auth/session.php';
// include 'session_value.php';
$input = filter_input_array(INPUT_POST);

$skill_id = $_SESSION['skill_id'];
$student_id = $input["s_id"];
$date = $_SESSION['date'];
$max_mark = $_SESSION['max_mark'];
$mark =  $input["mark"];

$sql= "SELECT DAY FROM attendence WHERE DATE ='$date' AND skill_id = $skill_id LIMIT 1";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
if(count($row)>0){
    $day = $row['DAY'];;
}else{
    $day = 1;
}

if($input["action"] === 'edit')
{
    $query = "
 INSERT INTO mark (skill_id,student_id,skill_day,DATE,max_mark,mark) VALUES(".$skill_id.",".$student_id.",".$day.",'".$date."',".$max_mark.",".$mark.")";

 mysqli_query($db, $query);

 $query = "UPDATE registered_course set status = '0' where skill_id=".$skill_id." and student_id=".$student_id;

 mysqli_query($db, $query);

    // $stmt = $db->prepare("INSERT INTO mark (skill_id,student_id,skill_day,DATE,max_mark,mark) VALUES(?,?,?,?,?,?");
    // // $stmt->bind_param('i',$mark);
    // $stmt->bind_param(iiisii,$skill_id,$student_id,$skill_day,'2022-12-17',$max_mark,$mark);
    // $stmt->execute();

}

echo json_encode($input);

?>
