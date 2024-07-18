<?php
require('../fpdf/fpdf.php');
include '../api/db/connection.php';
include '../api/auth/session.php';

class PDF extends FPDF
{
    function Header()
    {
        $img1 = '../images/logo/logo_sm.png';

        // $this->Image('', 30, 8, 20,50);
        $this->Image($img1, 23, 15, 0, 15);

        // Set font-family and font-size
        $this->SetFont('arial', 'B', 20);
        $this->Ln(6.5);

        // // Move to the right
        $this->Cell(80);

        // // Set the title of pages.
        $this->Cell(47, 10.5, 'Bannari Amman Institute of Techonology', 0, 1, 'C');
        $this->Cell(80);

        $this->SetFont('arial', 'B', 7);
        $this->Cell(47, 0, "An Autonomous Institute affiliated to Anna University. Approved by AICTE Accredited by NAAC with 'A+' Grade", 0, 1, 'C');

        // // Break line with given space
        $this->Ln(12);
    }
}

$pdf = new PDF();
$pdf->AddPage();

if (isset($_POST['date'])) {
    extract($_POST);

    $skill_id = $_SESSION['skill_id'];
    $final_date = date_format(date_create($date), "d-m-Y");
    $sql = "SELECT skill_name,skill_code,skill_cat,skill_dept,skill_year,f.f_name,f.f_id,d.dept_name FROM skill s INNER JOIN faculty f ON s.incharge_staff = f.fid INNER JOIN department d ON d.id = s.skill_dept WHERE s.sk_id = $skill_id ";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql = "SELECT s.roll_no,s.name,a.attendence,s.s_id,a.day FROM attendence a INNER JOIN students s ON s.s_id = a.student_id where a.skill_id = $skill_id and a.date='$date'";
    $result = mysqli_query($db, $sql);
    $s_no = 1;
    $present = 0;
    $absent = 0;
    $od = 0;
    $data = array();
    while ($row_attendence = $result->fetch_assoc()) {
        array_push($data, $row_attendence);
        if ($row_attendence['attendence'] == '1') {
            $present++;
        }
        if ($row_attendence['attendence'] == '2') {
            $absent++;
        }
        if ($row_attendence['attendence'] == '3') {
            $od++;
        }
    }
    $total = $present + $absent + $od;

    $pdf->SetFont("Arial", "B", "13");

    $pdf->Cell(50, 10, "Report Details", 0, 0);
    $pdf->Cell(0, 10, "Date: $final_date" . " (Day - " . $data[0]['day'] . ")", 0, 1, 'R');

    $pdf->SetFont("Arial", "", "12");
    $pdf->Cell(26, 7, "Skill Name", 0, 0);
    $pdf->Cell(0, 7, ":  " . $row['skill_name'], 0, 1);
    $skill_name = $row['skill_name'];

    $pdf->Cell(26, 5, "Department", 0, 0);
    $pdf->Cell(0, 5, ":  " . $row['skill_year'] . " Year - " . $row['dept_name'], 0, 1);
    $year = $row['skill_year'];

    $pdf->Cell(26, 7, "Skill Code", 0, 0);
    $pdf->Cell(0, 7, ":  " . $row['skill_code'] . " - " . $row['skill_cat'], 0, 1);

    $pdf->Cell(26, 5, "Faculty", 0, 0);
    $pdf->Cell(0, 5, ":  " . $row['f_name'] . " - " . $row['f_id'], 0, 1);

    $pdf->Ln(3);
    $pdf->SetFont("Arial", "B", "12");
    $pdf->Cell(50, 10, "Attendence Count", 0, 1);


    $pdf->SetFont("Arial", "B", "10");
    $pdf->Cell(20, 8, "Present", 1, 0, "C");
    $pdf->Cell(20, 8, "Absent", 1, 0, "C");
    $pdf->Cell(20, 8, "On Duty", 1, 0, "C");
    $pdf->Cell(30, 8, "Totol Students", 1, 1, "C");

    $pdf->SetFont("Arial", "", "10");
    $pdf->Cell(20, 7, $present, 1, 0, "C");
    $pdf->Cell(20, 7, $absent, 1, 0, "C");
    $pdf->Cell(20, 7, $od, 1, 0, "C");
    $pdf->Cell(30, 7, $total, 1, 1, "C");

    $pdf->Ln(3);
    $pdf->SetFont("Arial", "B", "12");
    $pdf->Cell(50, 10, "Attendence and Mark Details", 0, 1);



    $pdf->SetFont("Arial", "B", "10");
    $pdf->Cell(15, 10, "S.No", 1, 0, "C");
    $pdf->Cell(31, 10, "Roll Number", 1, 0, "C");
    $pdf->Cell(100, 10, "  Student Name", 1, 0, "L");
    $pdf->Cell(25, 10, "Attendence", 1, 0, "C");
    $pdf->Cell(0, 10, "Mark", 1, 1, "C");

    foreach ($data as $item) {
        $pdf->SetFont("Arial", "", "9");
        if ($item['attendence'] == '1') {
            $pdf->SetTextColor(0, 0, 0);
        }
        if ($item['attendence'] == '2') {
            $pdf->SetTextColor(255, 0, 0);
        }
        if ($item['attendence'] == '3') {
            $pdf->SetTextColor(166, 108, 0);
        }
        $pdf->Cell(15, 7, $s_no, 1, 0, "C");
        $pdf->Cell(31, 7, $item['roll_no'], 1, 0, "C");
        $pdf->Cell(100, 7, "  $item[name]", 1, 0, "L");
        if ($item['attendence'] == '1') {
            $pdf->SetFont("Arial", "B", "9");
            $pdf->Cell(25, 7, "Present", 1, 0, "C");
        }
        if ($item['attendence'] == '2') {
            $pdf->SetFont("Arial", "B", "9");
            $pdf->SetTextColor(255, 0, 0);
            $pdf->Cell(25, 7, "Absent", 1, 0, "C");
        }
        if ($item['attendence'] == '3') {
            $pdf->SetFont("Arial", "B", "9");
            $pdf->SetTextColor(166, 108, 0);
            $pdf->Cell(25, 7, "On Duty", 1, 0, "C");
        }
        $sql = "SELECT * FROM mark WHERE skill_id=$skill_id AND DATE='$date' AND student_id=$item[s_id]";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                $pdf->Cell(0, 7, $row['mark'] . " / " . $row['max_mark'], 1, 1, "C");
            }
        } else {
            $pdf->Cell(0, 7, '-', 1, 1, "C");
        }
        $s_no++;
    }


} else {
    $pdf->SetFont("Arial", "B", "20");
    $pdf->Ln(100);
    $pdf->Cell(0, 10, "Error! Unable to get PDF.", 0, 1, "C");
}

if (isset($_POST['view'])) {
    $pdf->output();
}
if (isset($_POST['download'])) {
    $file = $year . " Year " .
        $skill_name . " " . $final_date . '.pdf';
    $pdf->output($file, 'D');
}
// $pdf->output($file,'D');