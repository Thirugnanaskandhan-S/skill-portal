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
                                    <h2>Reports</h2>
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
        getList()
        function getList(){
         
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
            document.getElementById("courseList").innerHTML = this.responseText;
         }
      }
      xmlhttp.open("GET", "api/skill/view_skill.php?page=report", true);
      xmlhttp.send();
      }

       function goReports(id) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log("success");
                }
            }
            xmlhttp.open("GET", "api/mark/session_value.php?skill_id="+id+"&date= &day= &max_mark= ", true);
            xmlhttp.send();
            window.location.href = './view_report.php?id=' + window.btoa(id);
        }

    </script>
</body>

</html>