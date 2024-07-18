<?php 
require_once '../db/connection.php';

?>


<?php
$day = intval($_GET['day']);
$skill_id = intval($_GET['skill_id']);

$sql="SELECT * FROM feedback INNER JOIN students ON feedback.student_id = students.s_id WHERE skill_id =$skill_id AND day = '$day'";
$result = mysqli_query($db,$sql);

echo "<table>
<tr>
<th>Roll Number</th>
<th>Student Name</th>
<th>Email</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['roll_no'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td> <button onclick='goDetailFeedback(".$row['id'].")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>