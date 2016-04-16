<?php

session_start();

$rethtml = "";
$i = 0;
$applicaitons_table = "applications";

$sql = "SELECT distinct profile from ".$applicaitons_table." where company_id='".$_SESSION['cid']."'";
$profiles = array();
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$profiles[$i] = $row['profile'];
		$i++;
	}

	$count = $i;
	$i = 0;

	while($count--) {
		$sql = "SELECT * from ".$applicaitons_table." where company_id='".$_SESSION['cid']."' and profile='".$profiles[$i]."'";
		$result = $mysqli->query($sql);
		$tableid = "table_".$i;
 		$rethtml = $rethtml."<h3>Applications for Profile:".$profiles[$i]."</h3><div class='table-responsive'><table class='table' id=table_".$i."><caption>Applications for ".$profiles[$i]."</caption><thead><td><b>Student ID</b></td><td><b>Student Name</b></td><td><b>Student Programme</b></td><td><b>Student Branch</b></td><td><b>CV Link</b></td></thead>";

		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['student_id']."</td><td class='data'>".$row['student_name']."</td><td class='data'>".$row['student_programme']."</td><td class='data'>".$row['student_branch']."</td><td><a href='downloadcv.php?filename=".$row['CV URL']."' target='_blank'>Download CV</a></td></tr>";
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