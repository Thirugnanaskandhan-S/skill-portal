<!DOCTYPE html>
<html lang="en">

<?php

include 'components/head.php';
include 'api/auth/session.php';

?>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php include 'components/sidebar.php'?>
            <div id="content">
                <?php include 'components/topbar.php'?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Students Attendence</h2>
                                </div>
                            </div>
                        </div>
                        <h1 id='courseList'></h1>
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
        function goDetailAttendence(id,day) {
            var date = new Date();
            var dd = String(date.getDate()).padStart(2, '0');
            var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = date.getFullYear();
            date = yyyy  + mm +  dd;
            window.location.href = './add_attendence.php?id=' + window.btoa(id)+'&date='+window.btoa(date)+'&day='+window.btoa(day);
        }
        function goAttendenceDate(id) {
            window.location.href = './all_attendence.php?id=' + window.btoa(id);
        }
        getCourseList()
        function getCourseList(){
         
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("courseList").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/skill/view_skill.php?page=attendence", true);
      xmlhttp.send();
      }
    </script>
</body>

</html>