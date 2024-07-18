<?php
require_once '../db/connection.php';
include '../auth/session.php';
?>


<?php
$skill_id = intval($_GET['skill_id']);
$date = $_GET['date'];
$starting_time = '';
$ending_time = '';
date_default_timezone_set("Asia/Kolkata");

$stmt = $db->prepare("SELECT * FROM registered_course INNER JOIN skill ON skill.sk_id = registered_course.skill_id INNER JOIN students ON students.s_id = registered_course.student_id WHERE registered_course.skill_id ='$skill_id'");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
  $starting_time = $row['starting_time'];
  $ending_time = $row['ending_time'];
}

$sql = "SELECT * FROM attendence INNER JOIN students ON attendence.student_id = students.s_id WHERE skill_id ='$skill_id' AND date = '$date'";
$result = mysqli_query($db, $sql);

$current_time =  date('h:i a');
$c = date("h:i a", strtotime(date('h:i a')));
$s = date("h:i a", strtotime($starting_time));
$e = date("h:i a", strtotime($ending_time));
$current = DateTime::createFromFormat('h:i a', $c);
$start = DateTime::createFromFormat('h:i a', $s);
$end = DateTime::createFromFormat('h:i a', $e);


echo "<table>
<tr>
<th>Roll Number</th>
<th>Student Name</th>
<th>Attendence</th>";
if ($_SESSION['edit_attendence'] == 'yes') {

  if ($current >= $start && $current <= $end) {
    echo "<th>Edit</th>";
  }
}
echo "</tr>";
while ($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['roll_no'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  if ($row['attendence'] == "1") {
    echo "<td style='color:green;font-weight: bold;'>Present</td>";
  }
  if ($row['attendence'] == "2") {
    echo "<td style='color:red;font-weight: bold;'>Absent</td>";
  }
  if ($row['attendence'] == "3") {
    echo "<td style='color:orange;font-weight: bold;'>On Duty</td>";
  }
  if ($_SESSION['edit_attendence'] == 'yes') {
    if ($current >= $start && $current <= $end) {
      if ($row['attendence'] == "1") {
        echo "<td><button onclick='updateAttendence(" . $row['id'] . ",2)' style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Absent</button>  <button onclick='updateAttendence(" . $row['id'] . ",3)' style='border:none;cursor:pointer;background-color: orange;color: white;padding: 5px 10px;border-radius: 5px;'>On Duty</button></td>";
      }
      if ($row['attendence'] == "2") {
        echo "<td><button onclick='updateAttendence(" . $row['id'] . ",1)' style='border:none;cursor:pointer;background-color: green;color: white;padding: 5px 10px;border-radius: 5px;'>Present</button>    <button onclick='updateAttendence(" . $row['id'] . ",3)' style='border:none;cursor:pointer;background-color: orange;color: white;padding: 5px 10px;border-radius: 5px;'>On Duty</button></td>";
      }
      if ($row['attendence'] == "3") {
        echo "<td><button onclick='updateAttendence(" . $row['id'] . ",1)' style='border:none;cursor:pointer;background-color: green;color: white;padding: 5px 10px;border-radius: 5px;'>Present</button>     <button onclick='updateAttendence(" . $row['id'] . ",2)' style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Absent</button></td>";
      }
    }
  }

  //   echo "<td> <button onclick='goDetailFeedback(".$row['id'].")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>