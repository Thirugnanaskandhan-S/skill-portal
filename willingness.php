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
                           <h2>Course Willingness</h2>
                        </div>
                     </div>
                  </div>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2>Available Courses</h2>
                        </div>
                     </div>

                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table id='readedTable' class="table table-bordered">

                              <head>
                                 <th>Skill Name</th>
                                 <th>Skill Category</th>
                                 <th>Starting Date</th>
                                 <th>Action</th>
                              </head>
                              <?php

                              $sql = "SELECT s.sk_id,s.skill_name,s.skill_cat,s.starting_date,c.cat_name FROM skill s inner join skill_cat c on s.skill_cat=c.id";
                              $result = mysqli_query($db, $sql);

                              while ($row = mysqli_fetch_array($result)) {
                                 echo "<tr>";
                                 echo "<td>" . $row['skill_name'] . "</td>";
                                 echo "<td style='width:20vw'>" . $row['cat_name'] . "</td>";
                                 echo "<td style='width:20vw'>" . $row['starting_date'] . "</td>";
                                 echo "<td style='width:10vw'> <button onclick='goDetailWilling(" . $row['sk_id'] . ")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
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
   function goDetailWilling(id) {
      window.location.href = './view_willing_detail.php?id=' + window.btoa(id);
   }

</script>

</html>