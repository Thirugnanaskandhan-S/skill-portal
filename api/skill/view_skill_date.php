<?php 
require_once '../db/connection.php';
include '../auth/session.php';

$sid = $_REQUEST['skill_id'];
$page = $_REQUEST['page'];
$data = array();

$sql="SELECT DISTINCT(DATE),DAY FROM attendence WHERE skill_id=$sid order by day desc";
$result = mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result)) {
  array_push($data,$row);
}
// $row = mysqli_fetch_assoc($result);
// $result = mysqli_query($db,$sql);

$sql1="SELECT daily_task_mark,final_ass_date,final_task_mark,skill_status,starting_date,ending_date FROM skill WHERE sk_id=$sid";
$result1 = mysqli_query($db,$sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2="SELECT MAX(DAY) FROM attendence WHERE DATE!='".date('Y-m-d')."' and skill_id=$sid";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$todayDay = $row2['MAX(DAY)'] +1;

if(date('Y-m-d')>= $row1['starting_date'] && date('Y-m-d') <= $row1['ending_date']){
  if(count($data)>0){
    if($data[0]['DATE']==date('Y-m-d')){
      $checkToday = false;
    }else{
      $checkToday = true;
    }
  }else{
    $checkToday = true;
  }
}else{
  $checkToday = false;
}


echo "
<div class='row margin_bottom_30'>";
if($row1['skill_status']=="1" && $page=="attendence" && $checkToday){
  list($year,$month,$date)= explode("-",strval(date("Y-m-d")));
  $todayDate=$year.$month.$date;
  $clickFunction = "goDetailAllAttendence(".$sid.",".$todayDate.",".$todayDay.")";
  echo "
  <div style='cursor: pointer;' onclick=".$clickFunction." class='col-md-12 col-lg-3 widget_progress_section margin_bottom_30'>
  <div class='white_shd full'>
      <div class='widget_progress_bar'>
          <a href='#'>
              <p class='progress_no'>Day ".$todayDay."</p>
          </a>
          <p style='margin-bottom: 0;' class='progress_head'>Date: ". date("d-m-Y") ."
          </p>
      </div>
  </div>
</div> 
";
}

if(mysqli_num_rows($result) > 0){
foreach ($data as $a) {

  $aaa = $a['DATE'];
  list($year,$month,$date)= explode("-",strval($aaa));
  $finaldate = $year.$month.$date;
  if($page=="attendence"){
    $clickFunction = "goDetailAllAttendence(".$sid.",".$finaldate.",".$a['DAY'].")";
  }elseif($page =="mark"){
    if($row1['final_ass_date']==$a['DATE']){
      $max_mark = $row1['final_task_mark'];
      $final_task = 1;
    }else{
      $max_mark = $row1['daily_task_mark'];
      $final_task = 0;
    }

    $clickFunction = "goAddMark(".$sid.",".$finaldate.",".$a['DAY'].",".$max_mark.",".$final_task.")";
  }elseif($page =="feedback"){
    $clickFunction = "goFeedback(".$sid.",".$finaldate.",".$a['DAY'].",".$row1['daily_task_mark'].")";
  }


  echo "
  <div style='cursor: pointer;' onclick='".$clickFunction."' class='col-md-12 col-lg-3 widget_progress_section margin_bottom_30'>
  <div class='white_shd full'>
      <div class='widget_progress_bar'>
          <a href='#'>
              <p class='progress_no'>Day ". $a['DAY']."</p>
          </a>
          <p style='margin-bottom: 0;' class='progress_head'>Date: ". $a['DATE'] ."
          </p>
      </div>
  </div>
</div> 
";
}
echo " 
</div>
</div>
</div>
</div>  
</div></div>";
}

mysqli_close($db);
?>