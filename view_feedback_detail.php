<!DOCTYPE html>
<html lang="en">
   
<?php

include 'components/head.php';
include 'api/auth/session.php';

?>

  <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php include 'components/sidebar.php'?>
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php include 'components/topbar.php'?>
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Feedback</h2>
                           </div>
                        </div>
                     </div>
                     <div class="row column1">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Feedback Detail</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                        <h6>Student Name</h6>
                                        <h4 id="name-roll-year"></h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Student Email ID</h6>
                                        <h4 id="email"></h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Skill</h6>
                                        <h4 id="skill_name-cat"></h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Faculty Incharge</h6>
                                        <h4 id="faculty-id"></h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Is skill usefull</h6>
                                        <h4 id="answer1">Yes</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Is trainer skilled</h6>
                                        <h4 id="answer2">Yes</h4>
                                    </div>
                                    <div class="col-lg-12">
                                        <h6>Is all Trainings are Done</h6>
                                        <h4 id="answer3">Yes</h4>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2"></div>
                        </div>
                        <!-- end row -->
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
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        const id = window.location.search.slice(1).split("&")[0].split("=")[1]
        const decodedid = window.atob(id);
        $.ajax({
            url: 'api/feedback/getFeedbackDetail.php',
            method: 'post',
            data: {
                'id': decodedid
            },
            dataType: 'json',
            success: function(result) {
                if (result.success == true) {
                    let data = result.data;
                    $('#name-roll-year').text(data.name+' - '+data.roll_no+'-'+data.year+' Year');
                    $('#email').text(data.email);
                    $('#skill_name-cat').text(data.skill_name+' - '+data.skill_cat);
                    $('#faculty-id').text(data.f_name + ' - '+data.f_id);
                    $('#answer1').text(data.is_skill_usefull);
                    $('#answer2').text(data.trainers_skilled);
                    $('#answer3').text(data.trainings_done);
                }
            }
        });
    </script>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>