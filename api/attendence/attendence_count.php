<?php 
require_once '../db/connection.php';
session_start();

$sid = $_REQUEST['skill_id'];
$date = $_REQUEST['date'];


$sql="SELECT COUNT(r.student_id) FROM registered_course r INNER JOIN students s ON r.student_id=s.s_id WHERE r.skill_id=$sid AND s.s_status='1'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
$totalStudents = $row['COUNT(r.student_id)'];
}else{
    $totalStudents =0;
}


$sql="SELECT COUNT(*) FROM attendence a WHERE attendence='1' and date='$date' and skill_id='$sid'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
$totalPresent = $row['COUNT(*)'];
}else{
    $totalPresent = 0;
}


$sql="SELECT COUNT(*) FROM attendence a WHERE attendence='2' and date='$date' and skill_id='$sid'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
$totalAbsent= $row['COUNT(*)'];
}else{
    $totalAbsent =0;
}


$sql="SELECT COUNT(*) FROM attendence a WHERE attendence='3' and date='$date' and skill_id='$sid'";
$result = mysqli_query($db,$sql);
if(mysqli_num_rows($result) > 0){
$row=mysqli_fetch_assoc($result);
$totalOD = $row['COUNT(*)'];
}else{
    $totalOD = 0;
}


echo "<div class='row column1'>
<div class='col-md-6 col-lg-3'>
    <div class='full counter_section margin_bottom_30'>
        <div class='couter_icon'>
            <div>
                <i class='fa fa-user green_color'></i>
            </div>
        </div>
        <div class='counter_no'>
            <div>
                <p class='total_no'>".$totalStudents."</p>
                <p class='head_couter'>Total Students</p>
            </div>
        </div>
    </div>
</div>
<div class='col-md-6 col-lg-3'>
    <div class='full counter_section margin_bottom_30'>
        <div class='couter_icon'>
            <div>
                <i class='fa fa-user blue1_color'></i>
            </div>
        </div>
        <div class='counter_no'>
            <div>
                <p class='total_no'>".$totalPresent."</p>
                <p class='head_couter'>Total Present</p>
            </div>
        </div>
    </div>
</div>
<div class='col-md-6 col-lg-3'>
    <div class='full counter_section margin_bottom_30'>
        <div class='couter_icon'>
            <div>
                <i class='fa fa-user red_color'></i>
            </div>
        </div>
        <div class='counter_no'>
            <div>
                <p class='total_no'>".$totalAbsent."</p>
                <p class='head_couter'>Total Absent</p>
            </div>
        </div>
    </div>
</div>
<div class='col-md-6 col-lg-3'>
    <div class='full counter_section margin_bottom_30'>
        <div class='couter_icon'>
            <div>
                <i class='fa fa-user yellow_color'></i>
            </div>
        </div>
        <div class='counter_no'>
            <div>
                <p class='total_no'>".$totalOD."</p>
                <p class='head_couter'>Total On Duty</p>
            </div>
        </div>
    </div>
</div>";


mysqli_close($db);
?>