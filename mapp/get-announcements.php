<?php

include '../db_connection.php';

$sid = $_POST['sid'];
$branch = $_POST['student_branch'];

$aannouncement_table = "announcements";

$aannouncement_query = 'SELECT * FROM '.$aannouncement_table.' WHERE branches_be LIKE "%'.$branch.'%"';
$announcement_result = $mysqli->query($aannouncement_query);


$response = array();
//echo "[";

while($announcement = $announcement_result->fetch_assoc()) {

	//$response[] = $appl;
	//echo json_encode($appl);
	//echo ",";

    $tmp = array();
    $tmp['company_name'] = $announcement['company_name'];
    $tmp['msg'] = $announcement['announcement'];
    $tmp['date'] = $announcement['date'];

    array_push($response, $tmp);
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
//echo "]";
echo json_encode($response);
$announcement_result->close();

?>