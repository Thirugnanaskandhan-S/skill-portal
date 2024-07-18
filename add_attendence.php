<!DOCTYPE html>
<html lang="en">
<?php 

include 'components/head.php';
include 'api/auth/session.php';

?>
<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <?php include'components/sidebar.php'?>
         <div id="content">
            <?php include'components/topbar.php'?>
            <div class="midde_cont">
               <div class="container-fluid">
                  <div class="row column_title">
                     <div class="col-md-12">
                        <div class="page_title">
                           <h2 id="skillDate"></h2>
                        </div>
                     </div>
                  </div>
                  <h1 id="attendenceCount"></h1>
                  <div id="attendenceStudentList"></div>
                  <div class="white_shd full margin_bottom_30">
                     <div class="full graph_head">
                        <div class="heading1 margin_0">
                           <h2 style="color: green;font-weight:bold">Attendence List</h2>
                        </div>
                     </div>
                     <div class="table_section padding_infor_info">
                        <div class="table-responsive-sm">
                           <table id="attendenceList" class="table table-bordered">
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
   <script>
      const id = window.location.search.slice(1).split("&")[0].split("=")[1]
      const skdate = window.location.search.slice(1).split("&")[1].split("=")[1]
      const day = window.location.search.slice(1).split("&")[2].split("=")[1]
      const skill = window.atob(id);
      const skillDate = window.atob(skdate);
      const skillDay = window.atob(day);
      console.log(skill);
      console.log(skillDate);
      console.log(skillDay);
      
      date = skillDate.slice(0,4)+"-"+skillDate.slice(4,6)+"-"+skillDate.slice(6,8);
      console.log(date);

      document.getElementById("skillDate").innerHTML="Mark Attendence - "+date;

      getStudentList();
      getAttendenceList();
      getAttendenceCount();

      function getStudentList(){
         if (skill == "") {
         document.getElementById("attendenceStudentList").innerHTML = "";
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("attendenceStudentList").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/attendence/view_attendence_list.php?skill_id=" + skill+"&date="+date, true);
      xmlhttp.send();
      }

      function getAttendenceList(){
         if (skill == "") {
         document.getElementById("attendenceList").innerHTML = "";
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("attendenceList").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/attendence/view_attendence.php?skill_id=" + skill+"&date="+date, true);
      xmlhttp.send();
      }

      function getAttendenceCount(){
         if (skill == "") {
         document.getElementById("attendenceCount").innerHTML = "";
      }
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("attendenceCount").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/attendence/attendence_count.php?skill_id=" + skill+"&date="+date, true);
      xmlhttp.send();
      }
      function updateAttendence(id,attendence) {
    $.ajax({
        url: 'api/attendence/update_attendence.php',
        method: 'post',
        data: {
            id,
            attendence
        },
        dataType: 'json',
        success: function(result) {
            console.log(result);
            if (result.success === true) {
                window.location.reload();
            } else if (result.success === false) {
                alert(result.error);
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
}

   </script>
</body>

</html>