<!DOCTYPE html>
<html lang="en">
<?php

include 'components/head.php';
include 'api/auth/session.php';

?>

<head>
    <link href="fSelect.css" rel="stylesheet" />
    <script src="jquery-2.2.3.min.js"></script>
    <script src="fSelect.js"></script>
    <script src="ikrPluginsForfSelect.js"></script>
</head>

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
                                    <h2>New Courses</h2>
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
                                            <div style="margin-top: 20px;" class="form-group">
                                                <label for="InputSkillMaster" class="form-control-label">Skill
                                                    Master</label>
                                                <select id="cboMaster"></select>


                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="InputSkillMaster" class="form-control-label">Skill
                                                    Master</label>
                                                <select class="custom-select" id="InputSkillMaster" required>
                                                    <option value="0">Select Option</option>
                                                    <?php
                                                    // require_once '../db/connection.php';
                                                    $result = mysqli_query($db, "SELECT * FROM skill_master where status='1'");
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                            <option value="<?php echo $row['id'] ?>"><?php echo $row['skill_name'] ?></option>
                                                            <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div> -->
                                            <!-- <div class="form-group">
                                                <label for="InputSkillName" class="form-control-label">Skill
                                                    Name</label>
                                                <input type="text" class="form-control" id="InputSkillName"
                                                    placeholder="Enter Skill Name" required>
                                            </div> -->
                                            <!-- <div style="margin-top: 20px;" class="form-group">
                                                <label for="InputSkillDes"
                                                    class="form-control-label">Description</label>
                                                <input type="text" class="form-control" id="InputSkillDes"
                                                    placeholder="Enter Skill Description">
                                            </div> -->
                                            <!-- <div style="margin-top: 20px;" class="row"> -->
                                            <!-- <div style="margin-right: 20px;" class="col">
                                                    <label for="InputSkillCode" class="form-control-label">Skill
                                                        Code</label>
                                                    <input type="text" class="form-control" id="InputSkillCode"
                                                        placeholder="Enter Skill Code">
                                                </div> -->
                                            <!-- <div style="margin-left: 20px;" class="col">
                                                    <label for="InputSkillCat" class="form-control-label">Skill
                                                        Catergory</label>
                                                        <input type="text" class="form-control" id="InputSkillCat"
                                                        placeholder="Enter Skill Category">
                                                    
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <label for="InputSkillCat" class="form-control-label">Skill
                                                    Category</label>
                                                <select class="custom-select" id="InputSkillCat" required>
                                                    <!-- <option value="0">Select Option</option> -->
                                                    <?php
                                                    // require_once '../db/connection.php';
                                                    $result = mysqli_query($db, "SELECT * FROM skill_cat where status='1'");
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['cat_name'] ?></option>
                                                        <?php
                                                    }
                                                    ?>

                                                </select>

                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="InputSkillYear" class="form-control-label">Skill For
                                                        Year</label>
                                                    <select class="form-control" id="InputSkillYear">
                                                        <option value="I">I - Year</option>
                                                        <option value="II">II - Year</option>
                                                        <option value="III">III - Year</option>
                                                        <option value="IV">IV - Year</option>
                                                    </select>
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="InputSkillDuration" class="form-control-label">Skill
                                                        Duration</label>
                                                    <input type="number" class="form-control" id="InputSkillDuration"
                                                        placeholder="Enter Skill Duration Days">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="InputSkillStartingDate"
                                                        class="form-control-label">Starting Date</label>
                                                    <input type="date" class="form-control" id="InputSkillStartingDate">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="InputSkillEndingDate" class="form-control-label">Ending
                                                        Date</label>
                                                    <input type="date" class="form-control" id="InputSkillEndingDate">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="InputSkillStartingTime"
                                                        class="form-control-label">Starting Time</label>
                                                    <input type="time" class="form-control" id="InputSkillStartingTime"
                                                        placeholder="Enter Starting Time">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="InputSkillEndingTime" class="form-control-label">Ending
                                                        Time</label>
                                                    <input type="time" class="form-control" id="InputSkillEndingTime"
                                                        placeholder="Enter Ending Time">
                                                </div>
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
                                            <div style="margin-top: 20px;" class="form-group">
                                                <label for="InputSkillDept"
                                                    class="form-control-label">Departments</label>
                                                <select id="cboDept"></select>
                                                <!-- <select class="custom-select" id="InputSkillDept" required>
                                                    <?php
                                                    // require_once '../db/connection.php';
                                                    $result = mysqli_query($db, 'SELECT * FROM department');
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                        ?>
                                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['dept_name'] ?></option>
                                                                    <?php
                                                    }
                                                    ?>

                                                </select> -->

                                            </div>

                                            <!-- <div class="form-group">
                                                <label for="InputSkillVenue" class="form-control-label">Venue On</label>
                                                <input type="text" class="form-control" id="InputSkillVenue"
                                                    placeholder="Enter Skill Venue">
                                            </div> -->
                                            <div class="form-group">
                                                <label for="InputFinalTaskDate" class="form-control-label">Final
                                                    Assesment Date</label>
                                                <input type="date" class="form-control" id="InputFinalTaskDate">
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="InputDailyTaskMark" class="form-control-label">Daily
                                                        Task Mark</label>
                                                    <input type="number" class="form-control" id="InputDailyTaskMark"
                                                        placeholder="Enter Daily Task Mark">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="InputFinalTaskMark" class="form-control-label">Final
                                                        Task Mark</label>
                                                    <input type="number" class="form-control" id="InputFinalTaskMark"
                                                        placeholder="Enter Final Task Mark">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div style="margin-right: 20px;" class="col">
                                                    <label for="InputFeedbackTime" class="form-control-label">Feedback
                                                        Time</label>
                                                    <input type="time" class="form-control" id="InputFeedbackTime"
                                                        placeholder="Enter Feedback Time">
                                                </div>
                                                <div style="margin-left: 20px;" class="col">
                                                    <label for="InputSkillMarkTime" class="form-control-label">Mark
                                                        Portal Time</label>
                                                    <input type="time" class="form-control" id="InputSkillMarkTime"
                                                        placeholder="Enter Mark Portal Opening Time">
                                                </div>
                                            </div>
                                            <div style="margin-top: 20px;" class="row">
                                                <div class="col">
                                                    <label for="InputSkillMaxRP" class="form-control-label">Max. Rewards
                                                        Point</label>
                                                    <input type="number" class="form-control" id="InputSkillMaxRP"
                                                        placeholder="Maximum RP">
                                                </div>
                                                <!-- <div class="col">
                                                    <label for="InputSkillMaxStudents" class="form-control-label">Max.
                                                        Student</label>
                                                    <input type="number" class="form-control" id="InputSkillMaxStudents"
                                                        placeholder="Maximum Students">
                                                </div> -->
                                                <div class="col">
                                                    <label for="InputSkillMinAttendence" class="form-control-label">Min.
                                                        Attendence</label>
                                                    <input type="number" class="form-control"
                                                        id="InputSkillMinAttendence" placeholder="Minimum Attendence">
                                                </div>
                                            </div>
                                            <div class="form-group">

                                            </div>
                                            <!-- <div class="form-group">
                                                <label for="InputSkillFaculty" class="form-control-label">Incharge
                                                    Faculty</label>
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
                                            </div> -->
                                            <div class="read_more">
                                                <a style='color:white' onclick="btnCreateSkill()"
                                                    class="main_bt read_bt">Register Skill</a>
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
    var oAllStudents = [];
    var oAllMaster = [];

    <?php
    // require_once '../db/connection.php';
    $result = mysqli_query($db, 'SELECT * FROM department');
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        oAllStudents.push({
            dept_id: <?php echo $row['id'] ?>,
            dept_name: "<?php echo $row['dept_name'] ?>",
        });
        <?php
    }

    ?>
    <?php

    $result = mysqli_query($db, "SELECT * FROM skill_master where status='1'");
    while ($row = mysqli_fetch_assoc($result)) {

        ?>
        oAllMaster.push({
            id: <?php echo $row['id'] ?>,
            skill_name: "<?php echo $row['skill_name'] ?>",
            skill_code: "<?php echo $row['skill_code'] ?>",
            skill_des: "<?php echo $row['skill_des'] ?>",
        });
        <?php
    }
    ?>

    $("#cboDept").ikrLoadfSelectCombo({
        List: oAllStudents,
        DisplayText: "dept_name", //Display Property name
        OtherProperties: "dept_id,dept_name", //OtherProperties means those properties of object that we need for use
        PrimaryKey: "dept_id", //PrimaryKey
    });

    $("#cboMaster").ikrLoadfSelectCombo({
        List: oAllMaster,
        DisplayText: "skill_name", //Display Property name
        OtherProperties: "id,skill_name,skill_code,skill_des", //OtherProperties means those properties of object that we need for use
        PrimaryKey: "id", //PrimaryKey
    });

    // $('#InputSkillMaster').on('change', function () {
    //     $.ajax({
    //         url: 'api/master/getMasterDetail.php',
    //         method: 'post',
    //         data: { 'id': this.value },
    //         dataType: 'json',
    //         success: function (result) {
    //             if (result.success == true) {
    //                 let data = result.data;
    //                 console.log(data);
    //                 $('#InputSkillName').val(data.skill_name);
    //                 $('#InputSkillDes').val(data.skill_des);
    //                 $('#InputSkillCat').val(data.cat_name);
    //             }
    //         }
    //     });
    // });


</script>

</html>