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
                                    <h2>Course Faculty</h2>
                                </div>
                            </div>
                        </div>
                        <div class="white_shd full margin_bottom_30">
                            <div class="full graph_head">
                                <div class="heading1 margin_0">
                                    <h2>Faculty Details</h2>
                                </div>
                            </div>

                            <div class="table_section padding_infor_info">
                                <div class="table-responsive-sm">
                                    <table id='readedTable' class="table table-bordered">

                                        <head>
                                            <!-- <th>Faculty ID</th> -->
                                            <th>Faculty Name</th>
                                            <th>Faculty Department</th>
                                            <th>Skill Name</th>
                                            <th>Count(Students)</th>
                                            <th>Action</th>
                                        </head>
                                        <?php

                                        $sql = "SELECT f.f_id,f.f_name,f.f_email,d.dept_name,w.count,w.id,f.fid,w.skill_id,s.skill_name,s.sk_id FROM willingness w INNER Join faculty f on f.fid = w.faculty_id inner join department d on d.id = f.f_dept inner join skill s on s.sk_id = w.skill_id  where w.status ='0'";
                                        $result = mysqli_query($db, $sql);

                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            // echo "<td>" . $row['f_id'] . "</td>";
                                            echo "<td>" . $row['f_name'] . "</td>";
                                            echo "<td>" . $row['dept_name'] . "</td>";
                                            echo "<td>" . $row['skill_name'] . "</td>";
                                            echo "<td>" . $row['count'] . "</td>";
                                            // echo "<td style='width:10vw'> <button onclick='goDetailMaster(" . $row['id'] . ")' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>View</button></td>";
                                            // echo "<td style='width:15vw'> <button onclick='approve(" . $row['id'] . "," . $row['fid'] . "," . $row['count'] . "," . $row['skill_id'] . ",1)' style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>Approve</button> <button onclick='approve(" . $row['id'] . "," . $row['fid'] . "," . $row['count'] . "," . $row['skill_id'] . ",2)' style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Decline</button></td>";
                                            echo "<td style='width:15vw'><button onclick=approve(" . $row['id'] . "," . $row['fid'] . "," . $row['count'] . "," . $row['skill_id'] . ",1,'".$row['f_name']."','".$row['f_email']."',".$row['sk_id'].") style='border:none;cursor:pointer;background-color: #20d484;color: white;padding: 5px 10px;border-radius: 5px;'>Approve</button>  <button onclick=approve(" . $row['id'] . "," . $row['fid'] . "," . $row['count'] . "," . $row['skill_id'] . ",2,'".$row['f_name']."','".$row['f_email']."',".$row['sk_id'].") style='border:none;cursor:pointer;background-color: red;color: white;padding: 5px 10px;border-radius: 5px;'>Decline</button></td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        mysqli_close($db);
                                        ?>
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
    function goDetailMaster(id) {
        window.location.href = './view_master_detail.php?id=' + window.btoa(id);
    }

    function approve(id, fid, count, sid, state,fName,fEmail,skillId) {
        console.log(skillId);
        $.ajax({
            url: 'api/willing/approve_willing.php',
            method: 'post',
            data: {
                id,
                fid,
                count,
                sid,
                state
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                // window.location.reload();
                if(state==1){
                    sendMail(skillId,fName,fEmail);
                }else{
                    window.location.reload();
                }
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function sendMail(id, fName, fEmail) {
        console.log(id,fEmail,fName);
        $.ajax({
            url: 'api/email/mail.php',
            method: 'post',
            data: {
                "id":id,
                "f_email":fEmail,
                "f_name":fName,
            },
            dataType: 'json',
            success: function (result) {
                console.log(result);
                window.location.reload();
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

</script>

</html>