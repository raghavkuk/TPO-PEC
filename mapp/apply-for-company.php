<?php

include '../db_connection.php';
$applications_table = "applications";

$jaf_id = $_POST['jaf_id'];
$company_id = $_POST['company_id'];
$job_designation = $_POST['job_designation'];
$company_name = $_POST['company_name'];
$sid = $_POST['sid'];
$student_name = $_POST['student_name'];
$student_programme = $_POST['student_programme'];
$student_branch = $_POST['student_branch'];
$cv_id = $_POST['cv_id'];
$date_of_application = date('Y-m-d H:i:s');



$application_query = "INSERT INTO ".$applications_table." (company_id, jaf_id, job_designation, company_name, sid, 
                        student_name, student_programme, student_branch, cv_id, date_of_application) VALUES ('".$company_id."', 
                        '".$jaf_id."', '".$job_designation."', '".$company_name."', '".$sid."', '".$student_name."', 
                        '".$student_programme."', '".$student_branch."', '".$cv_id."', '".$date_of_application."')";

$application_result = $mysqli->query($application_query);
$a = array(
    'result' => "Success",
    'another' => 'test',
    'ananother' => 456,
);
echo json_encode($a);
?>