<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();

if ($db) {
    try {
        $res = array();
        $data = array();
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            extract($_POST);
            $stmt = $db->prepare("SELECT * FROM students WHERE email = ?");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data = $row;
                }
                $res['success'] = true;
                $res['data'] = $data;
            }else{
                $res['success'] = false;
                $res['message'] = "No User Found";
            }
            $stmt->close();
        } else {
            $res['success'] = false;
            $res['message'] = 'missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['message'] = 'Error: ' . $ex->__toString();
    }
    echo json_encode($res);
} else {
    $res['success'] = false;
    $res['message'] = 'Database Error';
}

$db->close();