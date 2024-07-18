<!DOCTYPE html>
<html lang="en">

<?php

include 'components/head.php';
include 'api/auth/session.php';

?>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <?php include 'components/sidebar.php' ?>
            <div id="content">
                <?php include 'components/topbar.php' ?>
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>View Course Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column4 graph">
                            <div class="col-md-6 margin_bottom_30">
                                <div class="dash_blog">
                                    <div class="dash_blog_inner">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2>Course Details</h2>
                                            </div>
                                        </div>
                                        <div class="table_section padding_infor_info">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <h6>Skill Name</h6>
                                                    <h4 id="skillName"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Skill Code</h6>
                                                    <h4 id="skillCode"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Skill Description</h6>
                                                    <h4 id="skillDes"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Skill Catergory</h6>
                                                    <h4 id="skillCat-Days"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Departments</h6>
                                                    <h4 id="year"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Departments</h6>
                                                    <h4 id="dept"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Skill Starting and Ending Date</h6>
                                                    <h4 id="date"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Skill Starting and Ending Date</h6>
                                                    <h4 id="time"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Final Task Date</h6>
                                                    <h4 id="finalTaskDate"></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 margin_bottom_30">
                                <div class="dash_blog">
                                    <div class="dash_blog_inner">
                                        <div class="full graph_head">
                                            <div class="heading1 margin_0">
                                                <h2>Other Details</h2>
                                            </div>
                                        </div>
                                        <div class="table_section padding_infor_info">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <h6>Venue On</h6>
                                                    <h4 id="venueOn"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Final Task Mark</h6>
                                                    <h4 id="finalTaskMark"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Daily Task Mark</h6>
                                                    <h4 id="dailyTaskMark"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Daily Feedback Time</h6>
                                                    <h4 id="feedbackTime"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Daily Feedback Time</h6>
                                                    <h4 id="markTime"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Max. Rewards Points</h6>
                                                    <h4 id="maxRP"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Max. Students</h6>
                                                    <h4 id="maxStudents"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Min. Attendence</h6>
                                                    <h4 id="minAttendence"></h4>
                                                </div>

                                                <div class="form-group">
                                                    <label for="InputMaxStudents" class="form-control-label">Max Students</label>
                                                    <input type="text" class="form-control" name="InputMaxStudents"
                                                        id="InputMaxStudents" placeholder="Enter Max Students" required>
                                                </div>

                                                <div class="read_more">
                                                    <button onclick="willing()" style='color:white'
                                                        class="main_bt read_bt">I'm Willing</button>
                                                </div>
                                                <!-- <button id="btnOpenReg" type="button" onclick="willing()"
                                                    class="btn btn-success btn-xs">
                                                    <i class="fa fa-check"></i> I'm Willing
                                                </button> -->

                                            </div>

                                        </div>
                                    </div>

                                </div>

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


        function willing() {
            $.ajax({
                url: 'api/willing/willing_state.php',
                method: 'post',
                data: {
                    "skill_id": decodedid,
                    "count": $('#InputMaxStudents').val().trim()

                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    if (result.success === true) {
                        alert(result.msg);
                        window.open('index.php', '_self');
                    } else if (result.success === false) {
                        alert(result.error);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }


        const id = window.location.search.slice(1).split("&")[0].split("=")[1]
        const decodedid = window.atob(id);
        $.ajax({
            url: 'api/skill/getCourseDetail.php',
            method: 'post',
            data: {
                'id': decodedid
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                if (result.success == true) {
                    let data = result.data;
                    let dept = result.dept;
                    $('#skillName').text(data.skill_name);
                    $('#skillCode').text(data.skill_code);
                    $('#skillDes').text(data.skill_des);
                    $('#skillCat-Days').text(data.skill_cat + " - " + data.skill_days + "Days");
                    $('#dept').text(dept);
                    $('#year').text(data.skill_year + " Years");
                    $('#date').text(data.starting_date + " to " + data.starting_date);
                    $('#time').text(data.starting_time + " to " + data.ending_time);
                    $('#venueOn').text(data.venue_on);
                    $('#maxRP').text(data.max_rp);
                    $('#finalTaskDate').text(data.final_ass_date);
                    $('#finalTaskMark').text(data.final_task_mark);
                    $('#dailyTaskMark').text(data.daily_task_mark);
                    $('#feedbackTime').text(data.feedback_time);
                    $('#markTime').text(data.mark_time);
                    $('#maxStudents').text(data.max_student);
                    $('#minAttendence').text(data.min_attendence);

                }
            }
        });
    </script>
</body>

</html>