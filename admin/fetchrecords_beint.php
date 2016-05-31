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
 		$rethtml = $rethtml."<h3>$branches[$i]</h3><div class='table-responsive'><table class='table' id=table_".$i."><caption>Placement Record for $branches[$i]</caption><thead><td class='data'><b>Student ID</b></td><td><b>Student Name</b></td><td><b>Gender</b></td><td><b>Student Branch</b></td><td><b>CGPA</b></td><td class='data'><b>Status</b></td><td><b>Company</b></td><td><b>Stipend</b></td><td><b>Eligible</b></td><td><b>Blocked?</b></td></thead>";

		while($row=$result->fetch_assoc()) {
			$id=$row['sid'];
			$rethtml = $rethtml."<tr><td id='sid:$id'>".$row['sid']."</td><td id='student_name:$id'>".$row['student_name']."</td><td id='gender:$id'>".$row['gender']."</td><td id='student_branch:$id'>".$row['student_branch']."</td><td contenteditable='true' id='cgpa:$id'>".$row['cgpa']."</td><td contenteditable='true' id='status:$id'>".$row['status']."</td><td contenteditable='true' id='company:$id'>".$row['company']."</td><td contenteditable='true' id='stipend:$id'>".$row['stipend']."</td><td contenteditable='true' id='eligible_further:$id'>".$row['eligible_further']."</td><td contenteditable='true' id='blocked:$id'>".$row['blocked']."</td>";
		    
		}
        $rethtml = $rethtml."</table><button id='export_".$tableid."' data-export='export' onclick=download('".$tableid."')>Download Info</button></div>";
		
		$i++;
	}
	
$mysqli->close();
echo $rethtml;
?>