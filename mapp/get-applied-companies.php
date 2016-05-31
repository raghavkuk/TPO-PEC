<?php

include '../db_connection.php';

$sid = "12103032";
$branch = "Computer Science & Engineering";

$student_details_table = "student_details";
$student_login_table = 'student_login';
$companies_table = "companies";
$app_table = "applications";
$cv_table = "cvs";

// $detail_query = "SELECT cgpa FROM ".$student_details_table." WHERE sid = ".$sid;
// $result = $mysqli->query($detail_query);
// $details_row = $result->fetch_assoc();

// $cgpa = $details_row['cgpa'];


$app_query = "SELECT * FROM ".$app_table." WHERE sid = ".$sid;
$app_result = $mysqli->query($app_query);

$i = 0;

$response = array();
echo "[";

while($appl = $app_result->fetch_assoc()) {

	$response[] = $appl;
	echo json_encode($appl);
	echo ",";
    // $jaf_id = $jaf['JAF_id'];
    // $company_id = $jaf['company_id'];
    // $job_designation = $jaf['job_designation'];
    // $job_description = $jaf['job_description'];
    // $ctc = $jaf['ctc'];
    // $gross = $jaf['gross'];
    // $perks = $jaf['perks'];
    // $bond = $jaf['bond'];
    // $min_cgpa = $jaf['cgpa'];
    // $interview = $jaf['interview'];
    // $selection_process = $jaf['selection_proc'];

    // $company_query = "SELECT company_name, company_about FROM ".$companies_table." WHERE company_id = ".$company_id;
    // $company_result = $mysqli->query($company_query);
    // $company = $company_result->fetch_assoc(); 
    // $company_name = $company['company_name'];
    // $company_about = $company['company_about'];  
}
echo "]";
//echo json_encode($response);
$app_result->close();

?>