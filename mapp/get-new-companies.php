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
echo "[";

while($jaf = $jaf_result->fetch_assoc()) {

	$response[] = $jaf;
	echo json_encode($jaf);
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
$jaf_result->close();

?>