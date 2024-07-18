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
                           <h2>Add Master</h2>
                        </div>
                     </div>
                  </div>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2>Master Details</h2>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info">
                        <div class="form-group">
                           <form action="api/master/add_master.php" method="post" enctype= "multipart/form-data">
                              <label for="InputMasterName" class="form-control-label">Skill Name</label>
                              <input type="text" class="form-control" name="InputMasterName" id="InputMasterName"
                                 placeholder="Enter Skill Name" required>
                        </div>
                        <div class="form-group">
                           <label for="InputMasterDes" class="form-control-label">Skill Name</label>
                           <input type="text" class="form-control" name="InputMasterDes" id="InputMasterDes"
                              placeholder="Enter Skill Description" required>
                        </div>

                        <!-- <div style="margin-top: 20px;" class="form-group">
                           <label for="InputMasterCat" class="form-control-label">Skill Category</label>
                           <select class="custom-select" name="InputMasterCat" id="InputMasterCat" required>
                              <?php
                              // require_once '../db/connection.php';
                              $result = mysqli_query($db, "SELECT * FROM skill_cat where status='1'");
                              while ($row = mysqli_fetch_assoc($result)) {

                                 ?>
                                 <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                 <?php
                              }
                              ?>

                           </select>

                        </div> -->
                        <div class="form-group">
                           <label for="InputMasterFile" class="form-control-label">Documents Prepared (Only PDF)</label>
                           <input type="file" class="form-control" name="InputMasterFile" id="InputMasterFile" placeholder="Choosse File"
                              required>
                        </div>

                        <div class="read_more">
                           <button style='color:white' class="main_bt read_bt">Register Skill</button>
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</body>
<script>

</script>

</html>