<?php

session_start();
include '../db_connection.php';

$rethtml = "";
$i = 0;
$applicaitons_table = "applications";

$sql = "SELECT distinct job_designation from ".$applicaitons_table." where company_id='".$_SESSION['cid']."'";
$profiles = array();
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$profiles[$i] = $row['job_designation'];
		$i++;
	}

	$count = $i;
	$i = 0;

	while($count--) {
		$sql = "SELECT * from ".$applicaitons_table." where company_id='".$_SESSION['cid']."' and job_designation='".$profiles[$i]."'";
		$result = $mysqli->query($sql);
		$tableid = "table_".$i;
 		$rethtml = $rethtml."<h3>Applications for Profile:".$profiles[$i]."</h3><div class='table-responsive'><table class='table' id=table_".$i."><caption>Applications for ".$profiles[$i]."</caption><thead><td class='data'><b>Student ID</b></td><td class='data'><b>Student Name</b></td><td class='data'><b>Student Programme</b></td><td class='data'><b>Student Branch</b></td><td class='non-data'><b>CV Link</b></td></thead>";

		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['sid']."</td><td class='data'>".$row['student_name']."</td><td class='data'>".$row['student_programme']."</td><td class='data'>".$row['student_branch']."</td><td class='non-data'><a href='downloadcv.php?filename=".$row['cv_id']."' target='_blank'>Download CV</a></td></tr>";
		}

		$rethtml = $rethtml."</table><button id='export_".$i."' data-export='export' onclick=download('".$tableid."')>Download Info</button></div>";
		$i++;
	}

} else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>