<?php

$sql = "select daily_task_mark from skill where sk_id =" . $_SESSION['skill_id'];
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$count = 0;



echo "<h4 style='color: red;'>Max Mark: " . $_SESSION['max_mark'] . "</h4>";
$date = $_SESSION['date'];
$skill_id = $_SESSION['skill_id'];
$data = array();
$data1 = array();
$query = "SELECT * FROM registered_course INNER JOIN skill ON skill.sk_id = registered_course.skill_id INNER JOIN students ON students.s_id = registered_course.student_id INNER JOIN attendence ON students.s_id = attendence.student_id WHERE registered_course.skill_id =$skill_id AND attendence = '1' AND attendence.date='$date'";
$result = mysqli_query($db, $query);
$stmt1 = $db->prepare("SELECT * FROM mark WHERE skill_id ='$skill_id' and date ='$date'");
$stmt1->execute();
$result1 = $stmt1->get_result();

while ($row = $result->fetch_assoc()) {
  array_push($data, $row);
}
while ($row1 = $result1->fetch_assoc()) {
  array_push($data1, $row1['student_id']);
}

foreach ($data as $a) {
  if (!in_array($a['s_id'], $data1)) {
    $count++;
  }
}


if ($count > 0) {
  echo "<div class='white_shd full margin_bottom_30'>
                                <div class='full graph_head'>
                                <div class='heading1 margin_0'>
                                <h2 style='color: green;font-weight:bold'>Students List (Pending)</h2>
                                </div>
                                </div>
                                <div class='table_section padding_infor_info'>"; ?>

  <div class='table-responsive-sm'>
    <table id='editable_table' class='table table-bordered'>
      <tr>
        <th>Roll Number</th>
        <th>Student Name</th>
        <th>Email</th>
        <th>Mark</th>
      </tr>

      <?php
      foreach ($data as $a) {
        if (!in_array($a['s_id'], $data1)) {
          echo "<tr>";
          echo "<td style='display:none;'>" . $a['s_id'] . "</td>";
          echo "<td>" . $a['roll_no'] . "</td>";
          echo "<td>" . $a['name'] . "</td>";
          echo "<td>" . $a['email'] . "</td>";
          echo "<td></td>";
          echo "</tr>";
        }
      }


      echo "</table>
                                </div>
                                </div>
                                </div>";
}
?>