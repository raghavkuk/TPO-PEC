<?php

session_start();
include '../db_connection.php';

$rethtml = "";
$i = 0;
$j=0;
$applicaitons_table = "applications";

$sql = "SELECT distinct company_id, company_name from ".$applicaitons_table;
$companies = array();

$companyname= array();

$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$companies[$i] = $row['company_id'];
		$companyname[$i]=$row['company_name'];
		$i++;
	}

	$count = $i;
	$i = 0;

	while($count--) {
		$j=0;
		$sql = "SELECT distinct job_designation,jobtype from ".$applicaitons_table." where company_id=$companies[$i]";

		$profiles=array();
		$jobtype=array();
		$result = $mysqli->query($sql);
		if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$profiles[$j]=$row['job_designation'];
				$jobtype[$j]=$row['jobtype'];
				$j++;
			}
		}
	$count2=$j;	
		$j=0;
		while($count2--)
		{
			$sql="SELECT * from $applicaitons_table where company_id=$companies[$i] and job_designation='$profiles[$j]'";
			$result1=$mysqli->query($sql);
			
		$tableid = "table_".$j;
 		$rethtml = $rethtml."<h3>Applications for <u>$companyname[$i]</u> for Profile:<u>".$profiles[$j]."</u> (".$jobtype[$j].")</h3><div class='table-responsive'><b>Search: </b><input type='text' class='search' id='t_".$tableid."' placeholder='Type a keyword'></input><table class='table' id=table_".$j."><caption>Applications for ".$profiles[$j]." (".$jobtype[$j].")</caption><thead><th><b>Student ID</b></th><th><b>Student Name</b></th><th><b>Student Programme</b></th><th><b>Student Branch</b></th><th class='noExl'><b>CV Link</b></th></thead>";
        
		while($row=$result1->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td>".$row['sid']."</td><td>".$row['student_name']."</td><td>".$row['student_programme']."</td><td>".$row['student_branch']."</td><td class='noExl'><a href='downloadcv.php?filename=".$row['cv_id']."' target='_blank'>Download CV</a></td></tr>";
		}

		$rethtml = $rethtml."</table><button id='export_".$j."' data-export='export' onclick=download('".$tableid."')>Download Info</button></div>";
		$j++;
	}
	$i++;
	}

} else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>