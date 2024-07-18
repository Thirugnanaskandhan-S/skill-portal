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
                                                <div class="col-lg-12">
                                                    <h6>Venue On</h6>
                                                    <h4 id="venueOn"></h4>
                                                </div>
                                                <div class="col-lg-12">
                                                    <h6>Faculty Incharge</h6>
                                                    <h4 id="inchargeFaculty"></h4>
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
                                                <div id="addVenueField" class="form-group">
                                                    <label for="InputVenue" class="form-control-label">Venue</label>
                                                    <input type="text" class="form-control" id="InputVenue">
                                                    <br>
                                                    <button id="btnOpenReg" onclick="addVenue()" type="button"
                                                        class="btn btn-success btn-xs">
                                                        <i class="fa fa-plus"></i> Add Venue
                                                    </button>
                                                </div>

                                                <div class="col-lg-12">
                                                    <h6>Registration status</h6>
                                                    <h4 id="registrationActive" style="color:green;">Active - On Going
                                                    </h4>
                                                    <h4 id="registrationNotActive" style="color:orange;">Not Active -
                                                        Completed</h4>
                                                </div>

                                                <?php

                                                if ($_SESSION['edit_course'] == 'yes') {
                                                    ?>
                                                    <div class="right_button">

                                                        <button id="btnOpenReg" onclick="registrationState('1')"
                                                            type="button" class="btn btn-success btn-xs">
                                                            <i class="fa fa-check"></i> Open Registration
                                                        </button>

                                                        <button id="btnCloseReg" onclick="registrationState('0')"
                                                            type="button" style="background-color:red;color:white"
                                                            class="btn  btn-xs">
                                                            <i class="fa fa-ban"> </i> Close Registration
                                                        </button>

                                                    </div>
                                                    <?php
                                                } ?>
                                                <br><br>
                                                <div class="col-lg-12">
                                                    <h6>Skill status</h6>
                                                    <h4 id="statusActive" style="color:green;">Active - On Going</h4>
                                                    <h4 id="statusNotActive" style="color:orange;">Not Active -
                                                        Completed</h4>
                                                    <h4 id="statusDropped" style="color:red;">Not Active - Dropped</h4>
                                                    <h4 id="statusDeleted" style="color:red;">Not Active - Deleted</h4>
                                                </div>
                                                <?php

                                                if ($_SESSION['edit_course'] == 'yes') {
                                                    ?>
                                                    <div class="right_button">

                                                        <button id="btnActive" onclick="skillState('1')" type="button"
                                                            class="btn btn-success btn-xs">
                                                            <i class="fa fa-check"></i> Turn Active
                                                        </button>


                                                        <button id="btnEdit" onclick="editCourse()" type="button"
                                                            class="btn btn-primary  btn-xs">
                                                            <i class="fa fa-edit"> </i> Edit
                                                        </button>

                                                        <button id="btnDrop" onclick="skillState('2')" type="button"
                                                            style="background-color:orange;color:white" class="btn  btn-xs">
                                                            <i class="fa fa-ban"> </i> Drop
                                                        </button>

                                                        <button id="btnDelete" onclick="skillState('4')" type="button"
                                                            style="background-color:red;color:white" class="btn  btn-xs">
                                                            <i class="fa fa-ban"> </i> Delete
                                                        </button>

                                                    </div>
                                                    <?php
                                                } ?>
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
        $('#statusActive').hide();
        $('#statusNotActive').hide();
        $('#statusDropped').hide();
        $('#statusDeleted').hide();
        $('#addVenueField').hide();

        $('#registrationActive').hide();
        $('#registrationNotActive').hide();

        $('#btnActive').hide();
        $('#btnDrop').hide();
        $('#btnEdit').hide();
        $('#btnDelete').hide();

        $('#btnOpenReg').hide();
        $('#btnCloseReg').hide();

        function registrationState(state) {
            $.ajax({
                url: 'api/skill/registration_state.php',
                method: 'post',
                data: {
                    "skillId": decodedid,
                    state,
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    if (result.success === true) {
                        window.location.reload();
                    } else if (result.success === false) {
                        alert(result.error);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function skillState(state) {
            $.ajax({
                url: 'api/skill/skill_state.php',
                method: 'post',
                data: {
                    "skillId": decodedid,
                    state,
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    if (result.success === true) {
                        window.location.reload();
                    } else if (result.success === false) {
                        alert(result.error);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function addVenue() {
            $.ajax({
                url: 'api/skill/update_venue.php',
                method: 'post',
                data: {
                    "skillId": decodedid,
                    "venue": $('#InputVenue').val().trim(),
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    if (result.success === true) {
                        window.location.reload();
                    } else if (result.success === false) {
                        alert(result.error);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function editCourse() {
            window.location.href = './edit_course.php?id=' + window.btoa(decodedid);
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
                if (result.success == true) {
                    let data = result.data;
                    let dept = result.dept;
                    $('#skillName').text(data.skill_name);
                    $('#skillCode').text(data.skill_code);
                    $('#skillDes').text(data.skill_des);
                    $('#skillCat-Days').text(data.cat_name + " - " + data.skill_days + "Days");
                    $('#dept').text(dept);
                    $('#year').text(data.skill_year + " Years");
                    $('#date').text(data.starting_date + " to " + data.ending_date);
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
                    $('#inchargeFaculty').text(data.f_name + ' - ' + data.f_id);
                    if (data.skill_status == 0) {
                        $('#statusNotActive').show();
                    } else if (data.skill_status == 1) {
                        $('#statusActive').show();
                    } else if (data.skill_status == 2) {
                        $('#statusDropped').show();
                    } else if (data.skill_status == 4) {
                        $('#statusDeleted').show();
                    }

                    if (data.skill_registration == 0) {
                        $('#registrationNotActive').show();
                        $('#btnOpenReg').show();
                    } else if (data.skill_registration == 1) {
                        $('#registrationActive').show();
                        $('#btnCloseReg').show();
                    }

                    if (data.skill_status == 0) {
                        $('#btnActive').show();
                    } else if (data.skill_status == 1) {
                        $('#btnEdit').show();
                        $('#btnDrop').show();
                        $('#btnDelete').show();
                    } else if (data.skill_status == 2) {
                        $('#btnActive').show();
                    } else if (data.skill_status == 4) {
                        $('#btnActive').show();
                    }

                   

                    if (data.venue_on == null) {
                        $('#addVenueField').show();

                    }
                }
            }
        });
    </script>
</body>

</html>