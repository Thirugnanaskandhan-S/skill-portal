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
                                    <h2>Students Marks</h2>
                                </div>
                            </div>
                        </div>
                        <h1 id='dateList'></h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        const id = window.location.search.slice(1).split("&")[0].split("=")[1]
        const skill = window.atob(id);


        function goAddMark(id,date,day,maxMark,final_task) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success");
                }
            }
            xmlhttp.open("GET", "api/mark/session_value.php?skill_id="+skill+"&date="+date+"&day="+day+"&max_mark="+maxMark+"&final_task="+final_task, true);
            xmlhttp.send();
            window.location.href = './add_mark.php?id=' + window.btoa(id)+'&date='+ window.btoa(date);
        }
        getStudentList()
        function getStudentList(){
         
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dateList").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "api/skill/view_skill_date.php?skill_id="+skill+"&page=mark", true);
      xmlhttp.send();
      }
    </script>
</body>

</html>