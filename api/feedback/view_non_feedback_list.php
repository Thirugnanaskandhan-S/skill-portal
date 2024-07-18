<?php 
require_once '../db/connection.php';

?>


<?php
$day = intval($_GET['day']);
$skill_id = intval($_GET['skill_id']);

$sql="SELECT * FROM registered_course r INNER JOIN students s ON r.student_id = s.s_id WHERE r.student_id NOT IN (SELECT student_id FROM feedback WHERE skill_id = $skill_id AND DAY = $day) AND r.skill_id = $skill_id";
$result = mysqli_query($db,$sql);

echo "<table>
<tr>
<th>Roll Number</th>
<th>Student Name</th>
<th>Email</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['roll_no'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>