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
                                    <h2>Skill Reports</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row column4 graph">
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Daily Status</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="full">
                                                    <div class="padding_infor_info">
                                                        <div class="form-group">
                                                            <form action="reports/report-by-date.php" method='post'>
                                                                <label for="InputDate"
                                                                class="form-control-label">Select Date</label>
                                                                
                                                            <select class="form-control" name="date" id="InputDate">
                                                                <?php
                                                                $skill_id = $_SESSION['skill_id'];
                                                    $result = mysqli_query($db, "SELECT DISTINCT(DATE),day FROM attendence WHERE skill_id = $skill_id order by date desc");
                                                    while ($row = mysqli_fetch_assoc($result)) {

                                                    ?>
                                                        <option value="<?php echo $row['DATE'] ?>"><?php echo "Day ". $row['day']. " - ".date_format(date_create($row['DATE']),"d-m-Y") ?></option>
                                                    <?php
                                                    }
                                                    ?>

                                                            </select>
                                                            <br>
                                                            <div class="tooltip_section">
                                                                <button type="submit" name='view' class="btn cur-p btn-primary"><i class="fa fa-file white_color"></i>       View</button>
                                                                <button type="submit" name='download' class="btn cur-p btn-success"><i class="fa fa-download white_color"></i>       Download</button>
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
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Student Report</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="full">
                                                    <div class="padding_infor_info">
                                                        <div class="form-group">
                                                            <label for="InputStudent"
                                                                class="form-control-label">Select Student</label>
                                                            <select class="form-control" id="InputStudent">
                                                                <option value="I">I - Year</option>
                                                            </select>
                                                            <br>
                                                            <div class="tooltip_section">
                                                                <button type="submit"  class="btn cur-p btn-primary"><i class="fa fa-file white_color"></i>       View</button>
                                                                <button type="submit"  class="btn cur-p btn-success"><i class="fa fa-download white_color"></i>       Download</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Over All Report</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="full">
                                                    <div class="padding_infor_info">
                                                            <div class="tooltip_section">
                                                                <button type="submit"  class="btn cur-p btn-primary"><i class="fa fa-file white_color"></i>       View</button>
                                                                <button type="submit"  class="btn cur-p btn-success"><i class="fa fa-download white_color"></i>       Download</button>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Attendence Percentage</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="full">
                                                    <div class="padding_infor_info">
                                                            <div class="tooltip_section">
                                                                <button type="submit"  class="btn cur-p btn-primary"><i class="fa fa-file white_color"></i>       View</button>
                                                                <button type="submit"  class="btn cur-p btn-success"><i class="fa fa-download white_color"></i>       Download</button>
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
    </div>
    </div>
    </div>
    </div>
    <script>

        const id = window.location.search.slice(1).split("&")[0].split("=")[1]
        const skill = window.atob(id);


    </script>
</body>

</html>