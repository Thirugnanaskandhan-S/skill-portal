<nav id="sidebar">
   <div class="sidebar_blog_1">
      <div class="sidebar-header">
         <div class="logo_section">
            <a href="index.php"><img class="logo_icon img-responsive" src="images/logo/logo_sm.png" alt="#" /></a>
         </div>
      </div>
      <div class="sidebar_user_info">
         <div class="icon_setting"></div>
         <div class="user_profle_side">
            <div class="user_img"><img class="img-responsive" src="images/layout_img/user_img.jpg" alt="#" /></div>
            <div class="user_info">
               <h6>
                  <?php echo $_SESSION['f_name'] ?>
               </h6>
               <p><span class="online_animation"></span> Active</p>
            </div>
         </div>
      </div>
   </div>
   <div class="sidebar_blog_2">
      <h4>Welcome</h4>
      <ul class="list-unstyled components">
         <li><a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a></li>
         <li><a href="course.php"><i class="fa fa-pie-chart purple_color"></i> <span>Courses</span></a></li>
         <li><a href="course_master.php"><i class="fa fa-pie-chart blue1_color"></i> <span>Courses Master</span></a>
         </li>
         <?php
         if ($_SESSION['willing_ness'] == 'yes') { ?>
            <li><a href="willingness.php"><i class="fa fa-pie-chart orange_color"></i> <span>Courses Willingness</span></a>
            </li>
         <?php }


         if ($_SESSION['course_faculty'] == "yes") { ?>
            <li><a href="course_faculty.php"><i class="fa fa-group red_color"></i> <span>Courses Faculty</span></a></li>
         <?php } ?>
         <li><a href="attendence.php"><i class="fa fa-edit white_color"></i> <span>Students Attendance</span></a></li>
         <li><a href="marks.php"><i class="fa fa-book green_color"></i><span>Students Mark</span></a></li>
         <li><a href="feedback.php"><i class="fa fa-thumbs-up blue1_color"></i><span>Students Feedback</span></a></li>
         <li><a href="complaint.php"><i class="fa fa-warning red_color"></i><span>Students Complaint</span></a></li>
         <!-- <li><a href="students_details.php"><i class="fa fa-group white_color"></i> <span>Students Details</span></a></li> -->
         <li><a href="report.php"><i class="fa fa-group white_color"></i> <span>Report</span></a></li>
         <li><a href="api/auth/logout.php"><i class="fa fa-sign-out orange_color"></i><span>Log Out</span></a></li>
      </ul>
   </div>
</nav>