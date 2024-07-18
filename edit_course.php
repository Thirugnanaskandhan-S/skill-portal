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
                                    <h2>Edit Courses</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row column4 graph">
                        <div class="col-md-6 margin_bottom_30">
                            <div class="dash_blog">
                                <div class="dash_blog_inner">
                                    <div class="dash_head">
                                        <h3><span>Courses Details</span></h3>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <form>
                                            <div class="form-group">
                                                <label for="skillName" class="form-control-label">Skill Name</label>
                                                <input type="text" class="form-control" id="skillName" placeholder="Enter Skill Name" required>
                                            </div>
                                            <div style="margin-top: 20px;" class="form-group">
                                                <label for="skillDes" class="form-control-label">Description</label>
                                                <input type="text" class="form-control" id="skillDes" placeholder="Enter Skill Description">
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="skillCode" class="form-control-label">Skill Code</label>
                                                    <input type="text" class="form-control" id="skillCode" placeholder="Enter Skill Code">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="Cat" class="form-control-label">Skill Catergory</label>
                                                    <select class="form-control" id="SkillCat">
                                                        <option value="Day Skill">Day Skill</option>
                                                        <option value="Night Skill">Night Skill</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="SkillYear" class="form-control-label">Skill For Year</label>
                                                    <select class="form-control" id="SkillYear">
                                                        <option value="I">I - Year</option>
                                                        <option value="II">II - Year</option>
                                                        <option value="III">III - Year</option>
                                                        <option value="IV">IV - Year</option>
                                                    </select>
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="skillDays" class="form-control-label">Skill Duration</label>
                                                    <input type="number" class="form-control" id="skillDays" placeholder="Enter Skill Duration Days">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="startingDate" class="form-control-label">Starting Date</label>
                                                    <input type="date" class="form-control" id="startingDate">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="endingDate" class="form-control-label">Ending Date</label>
                                                    <input type="date" class="form-control" id="endingDate">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="startingTime" class="form-control-label">Starting Time</label>
                                                    <input type="time" class="form-control" id="startingTime" placeholder="Enter Starting Time">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="endingTime" class="form-control-label">Ending Time</label>
                                                    <input type="time" class="form-control" id="endingTime" placeholder="Enter Ending Time">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="form-group">
                                                <label for="skillDept" class="form-control-label">Departments</label>
                                                <select class="custom-select" id="skillDept" required>
                                                    <?php
                                                    // require_once '../db/connection.php';
                                                    $result = mysqli_query($db, 'SELECT * FROM department');
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['dept_name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 margin_bottom_30">
                            <div class="dash_blog">
                                <div class="dash_blog_inner">
                                    <div class="dash_head">
                                        <h3><span>Other Details</span></span>
                                        </h3>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <form>

                                            <div class="form-group">
                                                <label for="venueOn" class="form-control-label">Venue On</label>
                                                <input type="text" class="form-control" id="venueOn" placeholder="Enter Skill Venue">
                                            </div>
                                            <div class="form-group">
                                                <label for="finalTaskDate" class="form-control-label">Final Assesment Date</label>
                                                <input type="date" class="form-control" id="finalTaskDate">
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="dailyTaskMark" class="form-control-label">Daily Task Mark</label>
                                                    <input type="number" class="form-control" id="dailyTaskMark" placeholder="Enter Daily Task Mark">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="finalTaskMark" class="form-control-label">Final Task Mark</label>
                                                    <input type="number" class="form-control" id="finalTaskMark" placeholder="Enter Final Task Mark">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="feedbackTime" class="form-control-label">Feedback Time</label>
                                                    <input type="time" class="form-control" id="feedbackTime" placeholder="Enter Feedback Time">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="markTime" class="form-control-label">Mark Portal Time</label>
                                                    <input type="time" class="form-control" id="markTime" placeholder="Enter Mark Portal Opening Time">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div class="col">
                                                    <label for="maxRP" class="form-control-label">Max. Rewards Point</label>
                                                    <input type="number" class="form-control" id="maxRP" placeholder="Maximum RP">
                                                </div>
                                                <div class="col">
                                                    <label for="maxStudents" class="form-control-label">Max. Student</label>
                                                    <input type="number" class="form-control" id="maxStudents" placeholder="Maximum Students">
                                                </div>
                                                <div class="col">
                                                    <label for="minAttendence" class="form-control-label">Min. Attendence</label>
                                                    <input type="number" class="form-control" id="minAttendence" placeholder="Minimum Attendence">
                                                </div>
                                            </div>
                                            <div class="form-group">

                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkillFaculty" class="form-control-label">Incharge Faculty</label>
                                                <select class="custom-select" id="InputSkillFaculty" required>
                                                    <?php
                                                    // require_once '../db/connection.php';
                                                    $result = mysqli_query($db, "SELECT * FROM faculty where status='1'");
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                    ?>

                                                        <option value="<?php echo $row['fid'] ?>"><?php echo $row['f_name'] . ' - ' . $row['f_id'] ?></option>
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="read_more">
                                                <a style='color:white' onclick="btnUpdateSkill()" class="main_bt read_bt">Update Skill</a>
                                            </div>
                                        </form>

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
    const decodedid = window.atob(id);
    $.ajax({
        url: 'api/skill/getCourseDetail.php',
        method: 'post',
        data: {
            'id': decodedid
        },
        dataType: 'json',
        success: function(result) {
            if (result.success == true) {
                console.log(result);
                let data = result.data;
                $('#skillName').val(data.skill_name);
                $('#skillCode').val(data.skill_code);
                $('#skillDes').val(data.skill_des);
                $('#skillCat').val(data.skill_cat);
                $('#skillDays').val(data.skill_days);
                $('#dept').val(data.dept_name);
                $('#year').val(data.skill_year);
                $('#startingDate').val(data.starting_date);
                $('#endingDate').val(data.ending_date);
                $('#venueOn').val(data.venue_on);
                $('#maxRP').val(data.max_rp);
                $('#finalTaskDate').val(data.final_ass_date);
                $('#finalTaskMark').val(data.final_task_mark);
                $('#dailyTaskMark').val(data.daily_task_mark);
                $('#feedbackTime').val(data.feedback_time);
                $('#maxStudents').val(data.max_student);
                $('#minAttendence').val(data.min_attendence);
                $('#inchargeFaculty').val(data.f_name + ' - ' + data.f_id);
                
            }
        }
    });
</script>

</html>