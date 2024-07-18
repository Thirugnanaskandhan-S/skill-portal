<?php
include 'db/connection.php';
$dept_id = array();
$OriginalString = "3-5-";
$dept_id = explode("-", $OriginalString);

echo json_encode($dept_id);

$course = array();
foreach ($dept_id as $d) {
    $stmt = $db->prepare("SELECT * FROM department where id = '$d'");
    $stmt->execute();
    $result = $stmt->get_result();
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            $course[] = $row['dept_name'];
        }
    }
}



echo json_encode($course);
