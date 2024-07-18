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
                                    <h2>Daily Feedback</h2>
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

        function goFeedback(id,date,day) {
            console.log(date);
            window.location.href = './feedback_list.php?id=' + window.btoa(id)+'&date='+ window.btoa(date)+'&day='+window.btoa(day);
        }
        getStudentList()
        function getStudentList(){
            
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("dateList").innerHTML = this.responseText;
        }
      }
      xmlhttp.open("GET", "api/skill/view_skill_date.php?skill_id="+skill+"&page=feedback", true);
      xmlhttp.send();
      }
    </script>
</body>

</html>