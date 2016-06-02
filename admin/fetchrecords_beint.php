<?php

session_start();
include '../db_connection.php';

$rethtml = "";
$i = 0;
$placement_table = "placementdetails_beint";
$branches=array();
$branches[0]="Aerospace";
$branches[1]="Civil";
$branches[2]="Computer Science";
$branches[3]="Electronics and Communication";
$branches[4]="Electrical";
$branches[5]="Mechanical";
$branches[6]="Metallurgy";
$branches[7]="Production";

	$count = 8;
	$i = 0;

	while($count--) {
		$j=0;
		$sql = "SELECT * from ".$placement_table." where student_branch='$branches[$i]'";
		$result = $mysqli->query($sql);
		$tableid = "table_".$i;
 		$rethtml = $rethtml."<h3>$branches[$i]</h3><div class='table-responsive'><table class='table' id=table_".$i."><caption>Internship Record for $branches[$i] (B.E.)</caption><thead><td class='data'><b>Student ID</b></td><td><b>Student Name</b></td><td><b>Gender</b></td><td><b>Student Branch</b></td><td><b>CGPA</b></td><td><b>Status</b></td><td><b>Company</b></td><td><b>Stipend</b></td><td><b>Eligible</b></td><td><b>Blocked?</b></td></thead>";

		while($row=$result->fetch_assoc()) {
			$id=$row['sid'];
			$placed="";
            $notplaced="";
            $higherstudies="";
			$placedstatus=$row['status'];
			if($placedstatus=="GOT INTERNSHIP")
				$placed="selected";
			if($placedstatus=="NOT YET")
				$notplaced="selected";
			$eligibilitystatus=$row['eligible_further'];
			$eligible="";
			$noteligible="";
			if($eligibilitystatus=="YES")
				$eligible="selected";
			if($eligibilitystatus=="NO")
				$noteligible="selected";
			$blockedstatus=$row['blocked'];
			$blocked="";
			$notblocked="";
			if($blockedstatus=="Y")
				$blocked="selected";
			if($blockedstatus=="N")
				$notblocked="selected";
			$rethtml = $rethtml."<tr><td id='sid:$id'>".$row['sid']."</td><td id='student_name:$id'>".$row['student_name']."</td><td id='gender:$id'>".$row['gender']."</td><td id='student_branch:$id'>".$row['student_branch']."</td><td id='cgpa:$id'>".$row['cgpa']."</td><td contenteditable='true' id='status:$id'><select name='status' class='status'><option value='NOT YET' $notplaced>Not Yet</option><option value='GOT INTERNSHIP' $placed>Got Internship</option></select></td><td contenteditable='true' id='company:$id'>".$row['company']."</td><td contenteditable='true' id='stipend:$id'>".$row['stipend']."</td><td contenteditable='true' id='eligible_further:$id'><select name='eligible' class='eligible'><option value='YES' $eligible>Eligible</option><option value='NO' $noteligible>Not Eligible</option></select></td><td contenteditable='true' id='blocked:$id'><select name='blocked' class='blocked'><option value='Y' $blocked>Blocked</option><option value='N' $notblocked>Not Blocked</option></select></td>";
		    
		}
        $rethtml = $rethtml."</table><button id='export_".$tableid."' data-export='export' onclick=download('".$tableid."')>Download Info</button></div>";
		
		$i++;
	}
	
$mysqli->close();
echo $rethtml;
?>