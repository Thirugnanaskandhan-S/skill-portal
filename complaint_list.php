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
                           <h2>Students Complaint</h2>
                        </div>
                     </div>
                  </div>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2>Pening Complaints</h2>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table id='pendingTable' class="table table-bordered">
                           
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2>Completed Complaint</h2>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table id = 'readedTable' class="table table-bordered">

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
   const id = window.location.search.slice(1).split("&")[0].split("=")[1]
    const skill = window.atob(id);
    console.log(skill);

   getPendingList()
   getReadedList()
   function getPendingList() {
        if (skill == "") {
            document.getElementById("pendingTable").innerHTML = "";
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("pendingTable").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "api/complaint/view_pending.php?skill_id=" + skill, true);
        xmlhttp.send();
    }

    function getReadedList() {
        if (skill == "") {
            document.getElementById("readedTable").innerHTML = "";
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("readedTable").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "api/complaint/view_completed.php?skill_id=" + skill, true);
        xmlhttp.send();
    }

    function goDetailComplaint(id) {
        window.location.href = './view_complaint_detail.php?id=' + window.btoa(id);
    }

</script>

</html>