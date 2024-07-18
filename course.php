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
                <?php include 'components/topbar.php'?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>All Courses</h2>
                                    <?php

                                    if($_SESSION['add_course']=='yes')
                                    {
                                        ?>
                                    <div class="read_more">
                                        <a class="main_bt read_bt" href="add_course.php"><span class="fa fa-plus-circle"></span> New Course</a>
                                    </div>
                                    <?php
                                    }?>
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
        getStudentList()
        function getStudentList(){
         
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("courseList").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/skill/view_skill.php?page=course", true);
      xmlhttp.send();
      }

    </script>
</body>

</html>