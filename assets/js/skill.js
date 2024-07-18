function goDetailCourse(id) {
    window.location.href = '.view_course.php?id=' + window.btoa(id);
}


function btnCreateSkill() {
    var skillDept = '';
    var skillMaster = '';

    if (
        $('#InputSkillName').val() != '' && $('#InputSkillCode').val() != '' && $('#InputSkillDes').val() != '' && $('#InputSkillCat').val() != '' &&
        $('#InputSkillYear').val() != '' && $('#InputSkillDuration').val() != '' && $('#InputSkillStartingDate').val() != '' &&
        $('#InputSkillEndingDate').val() != '' && $('#InputSkillVenue').val() != '' && $('#InputSkillMaxRP').val() != '' && $('#InputSkillMaxStudents').val() != '' &&
        $('#InputSkillMinAttendence').val() != '' && $('#InputFinalAssDate').val() != '' && $('#InputFinalTaskMark').val() != '' &&
        $('#InputDailyTaskMark').val() != '' && $('#InputFeedbackTime').val() != '' && $('#InputSkillMarkTime').val() != '' && $('#InputSkillStartingTime').val() != '' && $('#InputSkillEndingTime').val() != ''

    ) {

        $("#cboDept").ikrGetValuefSelectCombo({
            PrimaryKey: "dept_id",
            DataValue: "dept_name", //Display Property name
            ReturnProperties: "dept_id,dept_name",
            IsReturnSingleValue: false
        }, function (response) {
            if (response.status && response.obj != null) {
                var selectedItemList = response.obj;
                for (var i = 0; i < selectedItemList.length; i++) {
                    skillDept = skillDept + selectedItemList[i].dept_id + "-";
                }
            }
        });

        $("#cboMaster").ikrGetValuefSelectCombo({
            PrimaryKey: "id",
            DataValue: "skill_name", //Display Property name
            ReturnProperties: "id,skill_name,skill_code,skill_des",
            IsReturnSingleValue: false
        }, function (response) {
            if (response.status && response.obj != null) {
                var selectedItemList = response.obj;
                for (var i = 0; i < selectedItemList.length; i++) {
                    console.log(selectedItemList[i].id + selectedItemList[i].skill_name + selectedItemList[i].skill_des + "-");


                    var skillMaster = selectedItemList[i].id;
                    var skillName = selectedItemList[i].skill_name;
                    var skillCode = selectedItemList[i].skill_code;
                    var skillDes = selectedItemList[i].skill_des;
                    var skillCat = $('#InputSkillCat').val().trim();
                    var skillYear = $('#InputSkillYear').val().trim();
                    var skillDays = $('#InputSkillDuration').val().trim();
                    var skillStartingDate = $('#InputSkillStartingDate').val().trim();
                    var skillEndingDate = $('#InputSkillEndingDate').val().trim();
                    var skillMaxRP = $('#InputSkillMaxRP').val().trim();
                    var skillMinAttendence = $('#InputSkillMinAttendence').val().trim();
                    var skillFinalTaskDate = $('#InputFinalTaskDate').val().trim();
                    var skillFinalTaskMark = $('#InputFinalTaskMark').val().trim();
                    var skillDailyTaskMark = $('#InputDailyTaskMark').val().trim();
                    var skillFeedbackTime = $('#InputFeedbackTime').val().trim();
                    var skillMarkTime = $('#InputSkillMarkTime').val().trim();
                    var skillStartingTime = $('#InputSkillStartingTime').val().trim();
                    var skillEndingTime = $('#InputSkillEndingTime').val().trim();


                    console.clear();
                    console.log(skillName);
                    console.log(skillCode);
                    console.log(skillCat);
                    console.log(skillDays);
                    console.log(skillDept);
                    console.log(skillStartingDate);
                    console.log(skillEndingDate);
                    console.log(skillMaxRP);
                    console.log(skillMinAttendence);

                    $.ajax({
                        url: 'api/skill/add_skill.php',
                        method: 'post',
                        data: {
                            skillMaster,
                            skillName,
                            skillCode,
                            skillDes,
                            skillCat,
                            skillYear,
                            skillDays,
                            skillDept,
                            skillStartingDate,
                            skillEndingDate,
                            skillMaxRP,
                            skillMinAttendence,
                            skillFinalTaskDate,
                            skillFinalTaskMark,
                            skillDailyTaskMark,
                            skillFeedbackTime,
                            skillMarkTime,
                            skillStartingTime,
                            skillEndingTime
                        },
                        dataType: 'json',
                        success: function (result) {
                            console.log(result);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            }
        });
        window.open('course.php','_self');
    } else {
        alert("Please enter all the details");

    }
}

function goDetailCourse(id) {
    window.location.href = '.view_course.php?id=' + window.btoa(id);
}