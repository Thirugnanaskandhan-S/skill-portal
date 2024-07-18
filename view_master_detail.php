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
                           <h2>Course Master</h2>
                        </div>
                     </div>
                  </div>
                  <div class="row column1">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <div class="white_shd full margin_bottom_30">
                           <div class="full graph_head">
                              <div class="heading1 margin_0">
                                 <h2>Master Detail</h2>
                              </div>
                           </div>
                           <div class="full price_table padding_infor_info">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <h6>Skill Name</h6>
                                    <h4 id="name"></h4>
                                 </div>
                                 <div class="col-lg-12">
                                    <h6>Skill Description</h6>
                                    <h4 id="des"></h4>
                                 </div>
                                 <div class="col-lg-12">
                                    <h6>Skill Handbook</h6>
                                    <h4 id="file"></h4>
                                 </div>
                                 <div class="col-lg-12">
                                    <label for="InputSkillCode" style="color:black" class="form-control-label">Skill
                                       Code</label>
                                    <h4 id="code"></h4>
                                    
                                 <?php 
                                 if($_SESSION['approve_master']=="yes"){ ?>
                                    <input type="text" class="form-control" id="InputSkillCode">
                                    <?php }?>
                                 </div>
                                 <form>
                                    <div style="margin-left:10px" class="form-group">
                                    </div>
                                 </form>
                                 <div id="statusPending" class="col-lg-12">
                                    <h6>Status</h6>
                                    <h4>Pending</h4>
                                 </div>

                                 <div id="statusApproved" class="col-lg-12">
                                    <h6>Status</h6>
                                    <h4 style="color:green">Approved</h4>
                                 </div>
                                 <div id="statusRejected" class="col-lg-12">
                                    <h6>Status</h6>
                                    <h4 style="color:red">Rejected</h4>
                                 </div>
                                 <?php 
                                 if($_SESSION['approve_master']=="yes"){ ?>
                                 <div style="margin-left: 10px;" class="actionBtn">
                                    <button id="btnApprove" onclick='Approve(1)'
                                       style='border:none;cursor:pointer;background-color: green;color: white;padding: 5px 10px;border-radius: 5px;margin-right:10px;'>Approve</button>
                                    <button id="btnDecline" onclick='Approve(2)'
                                       style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Reject</button>
                                 </div>
                                 <?php } ?>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class=" col-md-2">
                     </div>
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
      $('#statusApproved').hide();
      $('#statusRejected').hide();

      $('#btnApprove').hide();
      $('#btnDecline').hide();

      $('#code').hide();
      $('#InputSkillCode').hide();



      const id = window.location.search.slice(1).split("&")[0].split("=")[1]
      const decodedid = window.atob(id);
      console.log(decodedid);

      fetchData();

      function fetchData() {
         $.ajax({
            url: 'api/master/getMasterDetail.php',
            method: 'post',
            data: {
               'id': decodedid
            },
            dataType: 'json',
            success: function (result) {
               console.log(result);
               if (result.success == true) {
                  let data = result.data;
                  $('#name').text(data.skill_name);
                  $('#des').text(data.skill_des);
                  $('#cat').text(data.cat_name);
                  $('#code').text(data.skill_code);
                  $('#file').text(data.doc_file);
                  if (data.status == 0) {
                     $('#statusPending').show();
                     $('#btnApprove').show();
                     $('#btnDecline').show();
                     $('#InputSkillCode').show();
                  } else if (data.status == 1) {
                     $('#statusApproved').show();
                     $('#btnDecline').show();
                     $('#code').show();

                  }
                  else if (data.status == 2) {
                     $('#statusRejected').show();
                     $('#btnApprove').show();
                     $('#InputSkillCode').show();

                  }
               }
            }
         });
      }

      function Approve(status) {
         $.ajax({
            url: 'api/master/approve_master.php',
            method: 'post',
            data: {
               'status': status,
               'id': decodedid,
               "skill_code": $('#InputSkillCode').val().trim()
            },
            dataType: 'json',
            success: function (result) {
               if (result.success == true) {
                  window.open("course_master.php", "_self");
               }
            }

         });

      }
   </script>

</body>

</html>