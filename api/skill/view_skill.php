<?php 
require_once '../db/connection.php';
session_start();
$fid = $_SESSION['fid'];



if($_SESSION['all_course']=='yes'){
  $sqlActive="SELECT * FROM skill inner join skill_cat c on skill.skill_cat = c.id where skill_status='1'";
  $sqlNotActive="SELECT * FROM skill inner join skill_cat c on skill.skill_cat = c.id where skill_status!='1'";
}else{
  $sqlActive="SELECT * FROM skill where skill_status='1' and incharge_staff='$fid'";
  $sqlNotActive="SELECT * FROM skill where skill_status!='1' and incharge_staff='$fid'";
}

$resultActive = mysqli_query($db,$sqlActive);
$resultNotActive = mysqli_query($db,$sqlNotActive);



// show active course
if(mysqli_num_rows($resultActive) > 0){
  echo "
<h4 style='color: green;'>Active Courses</h4>
<div class='row margin_bottom_30'>";
while($row = mysqli_fetch_array($resultActive)) {

  if($_REQUEST['page']=='course')
  {
    $clickFunction = "goDetailCourse(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='mark')
  {
    if($_SESSION['all_mark']=='yes'){
      $clickFunction = "goAllMark(".$row['sk_id'].")";
    }else{
      $day = '';
      if($row['final_ass_date']==date("Y-m-d")){
        $max_mark = $row['final_task_mark'];
        $_SESSION['final_task']='yes';
      }else{
        $max_mark = $row['daily_task_mark'];
        $_SESSION['final_task']='no';
      }
      $clickFunction = "goAddMark(".$row['sk_id'].",".$max_mark.",".$day.")";
    }
  }
  elseif($_REQUEST['page']=='attendence')
  {
    if($_SESSION['all_attendence']=='yes'){
      $clickFunction = "goAttendenceDate(".$row['sk_id'].")";
    }else{
      $day = '';
      $clickFunction = "goDetailAttendence(".$row['sk_id'].",".$day.")";
    }
  }
  elseif($_REQUEST['page']=='feedback')
  {
      $clickFunction = "goFeedbackList(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='complaint')
  {
      $clickFunction = "goComplaintList(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='report')
  {
      $clickFunction = "goReports(".$row['sk_id'].")";
  }

  echo "
  <div style='cursor: pointer;' onclick='".$clickFunction."' class='col-md-12 col-lg-3 widget_progress_section margin_bottom_30'>
  <div class='white_shd full'>
      <div class='widget_progress_bar'>
          <a href='#'>
              <p class='progress_no'>". $row['skill_name']."</p>
          </a>
          <p style='margin-bottom: 0;' class='progress_head'>For: ". $row['skill_year'] ." - Year - ". $row['cat_name']."
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

// show not active course
if(mysqli_num_rows($resultNotActive) > 0){
  echo "
<h4 style='color: red;'>Not Active Courses</h4>
<div class='row margin_bottom_30'>";
while($row = mysqli_fetch_array($resultNotActive)) {

  if($_SESSION['non_active_course']=='yes'){
    if($_REQUEST['page']=='course')
  {
    $clickFunction = "goDetailCourse(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='mark')
  {
    if($_SESSION['all_mark']=='yes'){
      $clickFunction = "goAllMark(".$row['sk_id'].")";
    }else{
      $day = '';
      if($row['final_ass_date']==date("Y-m-d")){
        $max_mark = $row['final_task_mark'];
        $_SESSION['final_task']='yes';
      }else{
        $max_mark = $row['daily_task_mark'];
        $_SESSION['final_task']='no';
      }
      $clickFunction = "goAddMark(".$row['sk_id'].",".$max_mark.",".$day.")";
    }
  }
  elseif($_REQUEST['page']=='attendence')
  {
    if($_SESSION['all_attendence']=='yes'){
      $clickFunction = "goAttendenceDate(".$row['sk_id'].")";
    }else{
      $day = '';
      $clickFunction = "goDetailAttendence(".$row['sk_id'].",".$day.")";
    }
  }
  elseif($_REQUEST['page']=='feedback')
  {
      $clickFunction = "goFeedbackList(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='report')
  {
      $clickFunction = "goReports(".$row['sk_id'].")";
  }
  elseif($_REQUEST['page']=='complaint')
  {
      $clickFunction = "goComplaintList(".$row['sk_id'].")";
  }
  }else{
    $clickFunction = "goDetailCourse(".$row['sk_id'].")";
  }

  echo "
  
  <div style='cursor: pointer;' onclick='".$clickFunction."' class='col-md-12 col-lg-3 widget_progress_section margin_bottom_30'>
  <div class='white_shd full'>
      <div class='widget_progress_bar'>
          <a href='#'>
              <p class='progress_no'>". $row['skill_name']."</p>
          </a>
          <p style='margin-bottom: 0;' class='progress_head'>For: ". $row['skill_year'] ." - Year - ". $row['skill_cat']."
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