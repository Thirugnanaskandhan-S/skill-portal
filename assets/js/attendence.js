var date = new Date();
var dd = String(date.getDate()).padStart(2, '0');
var mm = String(date.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = date.getFullYear();

date = yyyy + '-' + mm + '-' + dd;


function addAttendence(skill_id,student_id,attendence) {
    $.ajax({
        url: 'api/attendence/add_attendence.php',
        method: 'post',
        data: {
            skill_id,
            student_id,
            date,
            attendence
        },
        dataType: 'json',
        success: function(result) {
            console.log(result);
            if (result.success === true) {
                window.location.reload();
            } else if (result.success === false) {
                alert(result.error);
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
}


