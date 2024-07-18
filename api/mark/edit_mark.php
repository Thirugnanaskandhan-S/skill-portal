<?php  
//action.php
include '../db/connection.php';
include '../auth/session.php';
// include 'session_value.php';
$input = filter_input_array(INPUT_POST);


$id = $input["id"];
$mark =  $input["mark"];


if($input["action"] === 'edit')
{
    $query = "update mark set mark= ".$mark." where id =".$id;

 mysqli_query($db, $query);
}

echo json_encode($input);

?>
