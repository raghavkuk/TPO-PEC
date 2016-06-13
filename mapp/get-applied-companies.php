<?php

include '../db_connection.php';

$sid = "12103032";
$branch = "Computer Science & Engineering";

$student_details_table = "student_details";
$student_login_table = 'student_login';
$companies_table = "companies";
$app_table = "applications";
$cv_table = "cvs";



$app_query = "SELECT * FROM ".$app_table." WHERE sid = ".$sid;
$app_result = $mysqli->query($app_query);

$i = 0;

$response = array();

while($appl = $app_result->fetch_assoc()) {

	$temp = array();

    $temp['company_name'] = $appl['company_name'];
    $temp['job_designation'] = $appl['job_designation'];
    $temp['company_id'] = $appl['company_id'];
    $temp['jaf_id'] = $appl['jaf_id'];
    $temp['sid'] = $appl['sid'];
    $temp['cv_id'] = $appl['cv_id'];
    $temp['student_name'] = $appl['student_name'];
    $temp['student_programme'] = $appl['student_programme'];
    $temp['student_branch'] = $appl['student_branch'];

    array_push($response, $temp);

}

echo json_encode($response);
$mysqli->close();

?>