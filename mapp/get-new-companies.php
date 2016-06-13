<?php

include '../db_connection.php';

$sid = $_POST['sid'];
$branch = $_POST['student_branch'];

$student_details_table = "student_details";
$student_login_table = 'student_login';
$companies_table = "companies";
$jaf_table = "jaf_details";
$cv_table = "cvs";

$detail_query = 'SELECT cgpa FROM '.$student_details_table.' WHERE sid = '.$sid;
$result = $mysqli->query($detail_query);
$details_row = $result->fetch_assoc();

$cgpa = $details_row['cgpa'];


$jaf_query = 'SELECT * FROM '.$jaf_table.' WHERE cgpa <= '.$cgpa.' AND branches_be LIKE"%'.$branch.'%"';
$jaf_result = $mysqli->query($jaf_query);

$i = 0;

$response = array();

while($jaf = $jaf_result->fetch_assoc()) {

    $temp = array();

    $temp['company_name'] = $jaf['company_name'];
    $temp['job_designation'] = $jaf['job_designation'];
    $temp['job_description'] = $jaf['job_description'];
    $temp['ctc'] = $jaf['ctc'];
    $temp['gross'] = $jaf['gross'];
    $temp['perks'] = $jaf['perks'];
    $temp['bond'] = $jaf['bond'];
    $temp['deadline'] = $jaf['deadline'];
    $temp['date_of_visit'] = $jaf['dateofvisit'];
    $temp['cgpa'] = $jaf['cgpa'];
    $temp['jaf_id'] = $jaf['JAF_id'];
    $temp['company_id'] = $jaf['company_id'];

    array_push($response, $temp);
     
}

echo json_encode($response);
$mysqli->close();

?>