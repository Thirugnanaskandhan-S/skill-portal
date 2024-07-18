<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
if ($db) {
    try {

        extract($_POST);
        $file_name = $_FILES['InputMasterFile']['name'];
        $file_tmp_name = $_FILES['InputMasterFile']['tmp_name'];


        $stmt = $db->prepare("INSERT INTO `skill_master`(`skill_name`, `skill_des`, `doc_file`) VALUES (?,?,?)");
        $stmt->bind_param('sss', $InputMasterName, $InputMasterDes, $file_name);

        $stmt->execute();

        if ($stmt->error) {
            $res['success'] = false;
            $res['error'] = 'Error: ' . $stmt->error;
        } else {
            if (move_uploaded_file($file_tmp_name, "../skill_doc/" . $file_name)) {
                $res['success'] = true;
                $res['msg'] = 'Submitted successfully';
            }
        }
        $stmt->close();

    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}
echo json_encode($res);
header("Location: ../../course_master.php");