<?php

include 'api/db/connection.php';

$students = array();
$attendence_arr = array();
$attendence = 0;
$totalDays = 0;
$totalPercentage = 0;
$min_attendence = 0;

$sql = "SELECT * FROM `registered_course` r INNER JOIN students s ON s.s_id = r.student_id WHERE skill_id = 14";
$result = mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result)) {
    array_push($students,$row);
}

$sql = "SELECT COUNT(DISTINCT(DATE)) FROM attendence WHERE skill_id = 14";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$totalDays = $row['COUNT(DISTINCT(DATE))'];

$sql = "SELECT min_attendence FROM skill WHERE sk_id = 14";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$min_attendence = $row['min_attendence'];

$stmt = $db->prepare("SELECT * FROM attendence WHERE skill_id =14 and date ='2022-12-24'");
$stmt->execute();
$attendence_res = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    array_push($attendence_arr, $row['student_id']);
}


foreach ($students as $item) {
    $sql = "SELECT attendence FROM attendence WHERE attendence IN ('1','3') AND student_id = $item[student_id]";
    $result = mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)){
        $attendence++;
    }
    if($attendence>0 && $totalDays >0 && $totalDays>0){
        $totalPercentage = $attendence/$totalDays*100;
        $totalPercentage = number_format($totalPercentage, 2);
        if($totalPercentage>=$min_attendence){
            echo $item['student_id'];
            if (!in_array($item['student_id'], $attendence_arr)) {
                echo "<tr>";
                  echo "<td>" . $item['roll_no'] . "</td>";
                  echo "<td>" . $item['name'] . "</td>";
                  echo "<td>" . $item['email'] . "</td>";
                  echo "</tr>";
              }
        }
    }
    $attendence=0;
}

