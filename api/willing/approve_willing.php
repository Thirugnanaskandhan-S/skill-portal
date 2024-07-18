<?php
session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../db/connection.php';

$db = db();
$res = array();
$data = array();

if ($db) {
    try {


        if (
            isset($_POST['id']) &&
            isset($_POST['fid']) &&
            isset($_POST['count']) &&
            isset($_POST['state']) &&
            isset($_POST['sid'])


        ) {
            extract($_POST);

            if($state=='1'){
                $stmt = $db->prepare("update willingness set status=? where id=?");
            $stmt->bind_param('si', $state,$id);
            
            $stmt->execute();

            $stmt = $db->prepare("update skill set incharge_staff=?,max_student=? where sk_id=?");
            $stmt->bind_param('iii', $fid,$count,$sid);
        

            $stmt->execute();

            }else if($state == '2'){
                $stmt = $db->prepare("update willingness set status=? where id=?");
                $stmt->bind_param('si', $state,$id);
                
                $stmt->execute();
            }
            if ($stmt->error) {
                $res['success'] = false;
                $res['error'] = 'Error: ' . $stmt->error;
            } else {
                $res['success'] = true;
                $res['msg'] = 'Submitted successfully';
            }
            $stmt->close();


        } else {
            $res['success'] = false;
            $res['error'] = 'Missing parameters';
        }
    } catch (Exception $ex) {
        $res['success'] = false;
        $res['error'] = $ex->__toString();
    }
} else {
    die('Database error');
}

echo json_encode($res);