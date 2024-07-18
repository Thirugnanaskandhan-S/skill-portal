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
                  <a class="main_bt read_bt" href="add_master.php"><span class="fa fa-plus-circle"></span> New
                     Master</a>

                  <br>
                  <br><br>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2>Master Details</h2>
                        </div>
                     </div>

                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table id='readedTable' class="table table-bordered">

                              <head>
                                 <th>Skill Name</th>
                                 <!-- <th>Skill Category</th> -->
                                 <th>Status</th>
                                 <th>Action</th>
                              </head>
                              <?php

                              $sql = "SELECT m.id,m.skill_name,m.status FROM skill_master m order by m.id desc";
                              $result = mysqli_query($db, $sql);

                              while ($row = mysqli_fetch_array($result)) {
                                 echo "<tr>";
                                 echo "<td>" . $row['skill_name'] . "</td>";
                                 // echo "<td>" . $row['skill_des'] . "</td>";
                                 // echo "<td>" . $row['cat_name'] . "</td>";
                                 if ($row['status'] == '0') {
                                    echo "<td style='width:10vw'>Pending</td>";
                                 }
                                 if ($row['status'] == '1') {
                                    echo "<td style='width:10vw;color:green;font-weight:bold'>Approved</td>";
                                 }
                                 if ($row['status'] == '2') {
                                    echo "<td style='width:10vw;color:red;font-weight:bold'>Rejected</td>";
                                 }
                                 echo "<td style='width:10vw'> <button onclick='goDetailMaster(" . $row['id'] . ")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
                                 echo "</tr>";
                              }
                              echo "</table>";
                              mysqli_close($db);
                              ?>
                           </table>
                        </div>
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
   function goDetailMaster(id) {
      window.location.href = './view_master_detail.php?id=' + window.btoa(id);
   }

</script>

</html>