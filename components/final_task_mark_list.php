<?php

echo "<h3 style='color: red;'>Final Assessment (".$_SESSION['max_mark']." Marks)</h3>";
echo "<h6>Only these students have Eligible of attending Final Assessment</h6>";
echo "<br>";

$students = array();
$mark_arr = array();
$final_list = array();
$attendence = 0;
$totalDays = 0;
$totalPercentage = 0;
$min_attendence = 0;
$date = $_SESSION['date'];
$skill_id = $_SESSION['skill_id'];

$sql = "SELECT * FROM `registered_course` r INNER JOIN students s ON s.s_id = r.student_id WHERE skill_id = $skill_id";
$result = mysqli_query($db,$sql);

while($row = mysqli_fetch_array($result)) {
    array_push($students,$row);
}

$sql = "SELECT COUNT(DISTINCT(DATE)) FROM attendence WHERE skill_id = $skill_id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$totalDays = $row['COUNT(DISTINCT(DATE))'];

$sql = "SELECT min_attendence FROM skill WHERE sk_id = $skill_id";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$min_attendence = $row['min_attendence'];

$stmt = $db->prepare("SELECT * FROM mark WHERE skill_id =$skill_id and date ='$date'");
$stmt->execute();
$mark_res = $stmt->get_result();

while ($row = $mark_res->fetch_assoc()) {
    array_push($mark_arr, $row['student_id']);
}

foreach ($students as $item) {
  $sql = "SELECT attendence FROM attendence WHERE attendence IN ('1','3') AND student_id = $item[student_id] and skill_id = $skill_id";
  $result = mysqli_query($db,$sql);
  while($row = mysqli_fetch_array($result)){
      $attendence++;
  }
  if($attendence>0 && $totalDays >0){
    $totalPercentage = $attendence/$totalDays*100;
    $totalPercentage = number_format($totalPercentage, 2);
    if($totalPercentage>=$min_attendence){
      if (!in_array($item['student_id'], $mark_arr)) {
        array_push($final_list,$item);
      }
    }
  }
  $attendence=0;
}
if(count($final_list)>0){
  echo "<div class='white_shd full margin_bottom_30'>
  <div class='full graph_head'>
  <div class='heading1 margin_0'>
  <h2 style='color: green;font-weight:bold'>Students List (Pending)</h2>
  </div>
  </div>
  <div class='table_section padding_infor_info'>";?>

  <div class='table-responsive-sm'>
  <table id ='editable_table' class='table table-bordered'>
  <tr>
  <th>Roll Number</th>
  <th>Student Name</th>
  <th>Email</th>
  <th>Mark</th>
  </tr>
  
  <?php
  foreach ($final_list as $data) {
    echo "<tr>";
    echo "<td style='display:none;'>" .$data['s_id']."</td>";
    echo "<td>" . $data['roll_no'] . "</td>";
    echo "<td>" . $data['name'] . "</td>";
    echo "<td>" . $data['email'] . "</td>";
    echo "<td></td>";
    echo "</tr>";
  }
  
  
  echo "</table>
  </div>
  </div>
  </div>";
  }
?>
