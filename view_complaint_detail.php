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
         <?php include 'components/sidebar.php' ?>
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <?php include 'components/topbar.php' ?>
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2>Complaints</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column1">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Complaint Detail</h2>
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
                                    <h6>Date</h6>
                                    <h4 id="date"></h4>
                                 </div>
                                 <div class="col-lg-12">
                                    <h6>Complaint Subject</h6>
                                    <h4 id="complaint_sub"></h4>
                                 </div>
                                 <div class="col-lg-12">
                                    <h6>Complaint Description</h6>
                                    <h4 id="complaint_des"></h4>
                                 </div>
                                 <div id="statusPending" class="col-lg-12">
                                    <h6>Complaint Status</h6>
                                    <h4 style="color:red">Pending</h4>
                                 </div>

                                 <div id="statusReaded" class="col-lg-12">
                                    <h6>Complaint Status</h6>
                                    <h4 style="color:green">Readed</h4>
                                 </div>
                                 <div id="readButton" class="read_more">
                                    <div class="center">
                                       <button onclick="markRead()">
                                          <a class="main_bt read_bt" href="">Mark as Read</a>
                                       </button>
                                    </div>
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

      $('#statusPending').hide();
      $('#statusReaded').hide();
      $('#readButton').hide();


      const id = window.location.search.slice(1).split("&")[0].split("=")[1]
      const decodedid = window.atob(id);
      $.ajax({
         url: 'api/complaint/getComplaintDetail.php',
         method: 'post',
         data: {
            'id': decodedid
         },
         dataType: 'json',
         success: function (result) {
            if (result.success == true) {
               let data = result.data;
               $('#name-roll-year').text(data.name + ' - ' + data.roll_no + '-' + data.year + ' Year');
               $('#email').text(data.email);
               $('#skill_name-cat').text(data.skill_name + ' - ' + data.skill_cat);
               $('#faculty-id').text(data.f_name + ' - ' + data.f_id);
               $('#date').text(data.date);
               $('#complaint_sub').text(data.complaint_sub);
               $('#complaint_des').text(data.complaint_des);
               if (data.status == 0) {
                  $('#statusPending').show();
                  $('#readButton').show();
               } else if (data.status == 1) {
                  $('#statusReaded').show();
               }
            }
         }
      });

      function markRead() {
         // $.ajax({
         //    url: 'api/complaint/mark_read.php',
         //    method: 'post',
         //    data: {
         //       'id': decodedid
         //    },
         //    dataType: 'json',
         //    success: function (result) {
         //       console.log(result);
         //       if (result.success == true) {
         // window.history.back();
         // location.reload();
         //       }
         //    }
         // });

      }
   </script>

</body>

</html>