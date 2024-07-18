<?php 
require_once '../db/connection.php';

?>


<?php
$skill_id = intval($_GET['skill_id']);

$sql="SELECT * FROM complaint c INNER JOIN students s ON c.student_id = s.s_id WHERE c.skill_id = $skill_id AND c.status = '1' ORDER BY id DESC";
$result = mysqli_query($db,$sql);

echo "<table>
<tr>
<th>Roll Number</th>
<th>Student Name</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['roll_no'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td style='color:green;font-weight:bold'>Readed</td>";
  echo "<td> <button onclick='goDetailComplaint (".$row['id'].")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
  echo "</tr>";
}
echo "</table>";
mysqli_close($db);
?>