<!DOCTYPE html>
<html lang="en">
<?php 
include 'components/head.php';
include 'api/auth/session.php';
?>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php include 'components/sidebar.php';?>
            <div id="content">
               <?php include 'components/topbar.php';?>
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Dashboard</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                     <?php
                            $result = mysqli_query($db, "SELECT COUNT(*) FROM students where s_status='1'");
                            $row = mysqli_fetch_assoc($result);
                            ?>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $row['COUNT(*)']?></p>
                                    <p class="head_couter">Total Students</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                            $result = mysqli_query($db, "SELECT COUNT(*) FROM skill");
                            $row = mysqli_fetch_assoc($result);
                            ?>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div>    
                                    <i class="fa fa-pie-chart green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $row['COUNT(*)']?></p>
                                    <p class="head_couter">Total Course</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                        <?php
                            $result = mysqli_query($db, "SELECT COUNT(*) FROM skill where skill_status='1'");
                            $row = mysqli_fetch_assoc($result);
                            ?>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $row['COUNT(*)']?></p>
                                    <p class="head_couter">Active Course</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                            $result = mysqli_query($db, "SELECT COUNT(*) FROM faculty where status='1'");
                            $row = mysqli_fetch_assoc($result);
                            ?>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-group red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no"><?php echo $row['COUNT(*)']?></p>
                                    <p class="head_couter">Total Faculty</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>   
                     <div class="row column4 graph">
                        <div class="col-md-6 margin_bottom_30">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class=""></i> On Going Courses</span><span class="plus_green_bt"></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Courses</p>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                    <?php
                            $result = mysqli_query($db, "SELECT * FROM skill where skill_status='1'");
                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
  
                                          <li style="cursor: pointer;" onclick="goDetailCourse(<?php echo $row['sk_id'] ?>)"><a><?php echo $row['skill_name']?></a><br><strong><?php echo $row['skill_year']?> - Years</strong></li>
                           <?php 
                            }
                            ?>

                                    </ul>
                                    <div class="read_more">
                                       <div class="center"><a class="main_bt read_bt" href="course.php">Read More</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 margin_bottom_30">
                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class=""></i> Complaints</span><span class="plus_green_bt"></span></h3>
                                 </div>
                                 <div class="list_cont">
                                    <p>Recents Updated Complaints</p>
                                 </div>
                                 <div class="task_list_main">
                                    <ul class="task_list">
                                    <?php
                            $result = mysqli_query($db, "SELECT * FROM complaint INNER JOIN students ON complaint.student_id = students.s_id WHERE complaint.status='0'");
                            while ($row = mysqli_fetch_assoc($result)) {

                            ?>
                                       <li style="cursor: pointer;" onclick="goDetailComplaint(<?php echo $row['id'] ?>)"><a><?php echo $row['complaint_sub']?></a><br><strong><?php echo $row['name'].' - '.$row['roll_no'] ?></strong></li>
                                       <?php 
                            }
                            ?>
                                    </ul>
                                    <div class="read_more">
                                       <div class="center"><a class="main_bt read_bt" href="complaint.php">Read More</a></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © BIT - SKILLS.<br><br>
                           Developed By: <a>Team Warriors</a>
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
        function goDetailCourse(id) {
            window.location.href = './view_course.php?id=' + window.btoa(id);
        }
        function goDetailComplaint(id) {
            window.location.href = './view_complaint_detail.php?id=' + window.btoa(id);
        }
    </script>
   </body>
</html>