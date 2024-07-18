<?php
require_once '../db/connection.php';
include '../auth/session.php';

$skill_id = intval($_GET['skill_id']);
$date = $_GET['date'];

$data = array();
$data1 = array();
$d = array();
$count = 0;
$starting_time='';
$ending_time='';
date_default_timezone_set("Asia/Kolkata");

$stmt = $db->prepare("SELECT * FROM registered_course INNER JOIN skill ON skill.sk_id = registered_course.skill_id INNER JOIN students ON students.s_id = registered_course.student_id WHERE registered_course.skill_id ='$skill_id'");
$stmt->execute();
$result = $stmt->get_result();

$stmt1 = $db->prepare("SELECT * FROM attendence WHERE skill_id ='$skill_id' and date ='$date'");
$stmt1->execute();
$result1 = $stmt1->get_result();

while ($row = $result->fetch_assoc()) {
  array_push($data, $row);
  array_push($d, $row['s_id']);
  $starting_time = $row['starting_time'];
  $ending_time = $row['ending_time'];
}

while ($row1 = $result1->fetch_assoc()) {
  array_push($data1, $row1['student_id']);
}

foreach ($data as $a) {
  if (!in_array($a['s_id'], $data1)) {
    $count++;
  }
}

// echo $starting_time . ' ' . $ending_time;

$current_time =  date('h:i a');
$c = date("h:i a",strtotime(date('h:i a')));
$s= date("h:i a",strtotime($starting_time));
$e= date("h:i a",strtotime($ending_time));
$current = DateTime::createFromFormat('h:i a', $c);
$start = DateTime::createFromFormat('h:i a', $s);
$end = DateTime::createFromFormat('h:i a', $e);


if ($current >= $start && $current <= $end) {
  if ($count > 0) {
    echo "<div class='white_shd full margin_bottom_30'>
    <div class='full graph_head'> 
    <div class='heading1 margin_0'>
    <h2 style='color: green;font-weight:bold'>Students List (Pending)</h2>
    </div>
    </div>
    <div class='table_section padding_infor_info'>
    <div class='table-responsive-sm'>
    <table class='table table-bordered'>
    <tr>
    <th>Roll Number</th>
    <th>Student Name</th>
    <th>Email</th>";
    if ($_SESSION['add_attendence'] == 'yes') {

      echo "<th>Action</th>";
    }
    echo "</tr>";
    foreach ($data as $a) {
      if (!in_array($a['s_id'], $data1)) {
        echo "<tr>";
        echo "<td>" . $a['roll_no'] . "</td>";
        echo "<td>" . $a['name'] . "</td>";
        echo "<td>" . $a['email'] . "</td>";
        if ($_SESSION['add_attendence'] == 'yes') {
          echo "<td><button onclick='addAttendence(" . $a['skill_id'] . "," . $a['s_id'] . ",1)' style='border:none;cursor:pointer;background-color: green;color: white;padding: 5px 10px;border-radius: 5px;'>Present</button>     <button onclick='addAttendence(" . $a['skill_id'] . "," . $a['s_id'] . ",2)' style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Absent</button>  <button onclick='addAttendence(" . $a['skill_id'] . "," . $a['s_id'] . ",3)' style='border:none;cursor:pointer;background-color: orange;color: white;padding: 5px 10px;border-radius: 5px;'>On Duty</button></td>";
        }
        echo "</tr>";
      }
    }


    echo "</table>
    </div>
    </div>
    </div>";
  }
} else {
  echo "<center><h1 style='margin: 25px 0px 25px 0px;'>Attendance Time Out</h1></center>";
}
mysqli_close($db);