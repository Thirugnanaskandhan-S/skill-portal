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
                                    <h2>Students Feedback</h2>
                                </div>
                            </div>
                        </div>
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2 style="color: green;font-weight:bold">Completed Feedback</h2>
                                </div>
                            </div>
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <table id="completedTable" class="table table-bordered">

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2 style="color: red;font-weight:bold">Not Completed Feedback</h2>
                                </div>
                            </div>
                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <table id="notCompletedTable" class="table table-bordered">

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
    const skdate = window.location.search.slice(1).split("&")[1].split("=")[1]
    const day = window.location.search.slice(1).split("&")[2].split("=")[1]
    const skill = window.atob(id);
    const skillDate = window.atob(skdate);
    const skillDay = window.atob(day);
    console.log(skill);
    console.log(skillDate);
    console.log(skillDay);

    date = skillDate.slice(0, 4) + "-" + skillDate.slice(4, 6) + "-" + skillDate.slice(6, 8);
    console.log(date);

    getFeedbackList()
    getNonFeedbackList()

    function goDetailFeedback(id) {
        window.location.href = './view_feedback_detail.php?id=' + window.btoa(id);
    }

    function getFeedbackList() {
        if (skill == "") {
            document.getElementById("completedTable").innerHTML = "";
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("completedTable").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "api/feedback/view_feedback_list.php?skill_id=" + skill + "&day=" + skillDay, true);
        xmlhttp.send();
    }

    function getNonFeedbackList() {
        if (skill == "") {
            document.getElementById("notCompletedTable").innerHTML = "";
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("notCompletedTable").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "api/feedback/view_non_feedback_list.php?skill_id=" + skill + "&day=" + skillDay, true);
        xmlhttp.send();
    }
</script>

</html>