<?php
include '../auth/session.php';

$skill_id = $_REQUEST['skill_id'];
$date = $_REQUEST['date'];
$day = $_REQUEST['day'];
$maxMark = $_REQUEST['max_mark'];
$final_task = $_REQUEST['final_task'];

$_SESSION['skill_id']=$skill_id;
$_SESSION['date']=$date;
$_SESSION['day'] =$day;
$_SESSION['max_mark'] =$maxMark;
$_SESSION['final_task']=$final_task; 

?>