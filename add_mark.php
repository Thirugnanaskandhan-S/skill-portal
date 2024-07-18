<!DOCTYPE html>
<html lang="en">
    <?php
        include 'components/head.php';
        include 'api/auth/session.php';
        
        ?>
    <body class="dashboard dashboard_1">
        <div class="full_container">
            <div class="inner_container">
                <?php include 'components/sidebar.php';?>
                <div id="content">
                    <?php include 'components/topbar.php';?>
                    <div class="midde_cont">
                        <div class="container-fluid">
                            <div class="row column_title">
                                <div class="col-md-12">
                                    <div class="page_title">
                                        <h2 id="skillDate"></h2>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            
                            if($_SESSION['final_task']==1){
                                include 'components/final_task_mark_list.php';
                            }else{
                                include 'components/daily_task_mark_list.php';
                            }

                            ?>
                            <div class="white_shd full margin_bottom_30">
                                <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                        <h2 style="color: green;font-weight:bold">Mark List</h2>
                                    </div>
                                </div>
                                <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                        <table id='markTable'  class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Roll Number</th>
                                                    <th>Student Name</th>
                                                    <th>Email</th>  
                                                    <th>Mark</th>
                                                <tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $finalSkillDate = substr($_SESSION['date'],0,4) ."-". substr(substr($_SESSION['date'],0,6),4,6)."-". substr($_SESSION['date'],6,8);
                                                $query = "SELECT * FROM mark m INNER JOIN students s ON s.s_id = m.student_id WHERE m.skill_id='$_SESSION[skill_id]' AND m.date = '$finalSkillDate'";
                                                $result = mysqli_query($db, $query);
                                                if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "
                                                    <tr>
                                                    <td style='display:none;'>".$row['id']."</td>
                                                    <td>".$row["roll_no"]."</td>
                                                    <td>".$row["name"]."</td>
                                                    <td>".$row["email"]."</td>
                                                    <td style='color: green;font-weight:600'>".$row["mark"]."</td>
                                                    </tr>
                                                    ";
                                                }  
                                            }
                                                ?>
                                            </tbody>
                                        </table>
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
        // // const day = window.location.search.slice(1).split("&")[2].split("=")[1]
        // const max_mark = window.location.search.slice(1).split("&")[2].split("=")[1]
        const skill = window.atob(id);
        const skillDate = window.atob(skdate);
        // const skillDay = window.atob(day);
        // const maxMark = window.atob(max_mark);
        // console.log(skill);
        // console.log(skillDate);
        // console.log(skillDay);
        // console.log(maxMark);
          
        date = skillDate.slice(0,4)+"-"+skillDate.slice(4,6)+"-"+skillDate.slice(6,8);
        console.log(date);
        
        document.getElementById("skillDate").innerHTML="Add Mark - "+date;
       
        
        $('#markTable').Tabledit({
          url:'api/mark/edit_mark.php',
          columns:{
           identifier:[0,'id'],
           editable:[[4, 'mark']]
          },
          deleteButton: false,
            editButton: false,
            
            onFail: function (jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
                // window.location.reload();
        },
            onSuccess:function(data, textStatus, jqXHR)
            {
                window.location.reload();
            }
        
         });
        
        
         $('#editable_table').Tabledit({
          url:'api/mark/add_mark.php',
          columns:{
           identifier:[0,'s_id'],
           editable:[[4, 'mark']]
          },
          deleteButton: false,
            editButton: false,
            
            onFail: function (jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
                window.location.reload();
        },
            onSuccess:function(data, textStatus, jqXHR)
            {
                window.location.reload();
            }
        
         });
        
     
        

        
        
    </script>
</html>