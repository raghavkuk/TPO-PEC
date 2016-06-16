<?php

session_start();
include '../db_connection.php';

$rethtml = "";
$i = 0;
$placement_table = "placementdetails_be";
$branches=array();
$branches[0]="Aerospace Engineering";
$branches[1]="Civil Engineering";
$branches[2]="Computer Science and Engineering";
$branches[3]="Electronics and Communication Engineering";
$branches[4]="Electrical Engineering";
$branches[5]="Mechanical Engineering";
$branches[6]="Materials and Metallurgical Engineering";
$branches[7]="Production and Industrial Engineering";
	$count = 8;
	$i = 0;
	while($count--) {
		$j=0;
		$sql = "SELECT * from ".$placement_table." where student_branch='$branches[$i]'";
		$result = $mysqli->query($sql);
		$tableid = "table_".$i;
 		$rethtml = $rethtml."<h3>$branches[$i]</h3><div class='table-responsive'><button id='export_".$tableid."' data-export='export' onclick=download('".$tableid."')>Download Info</button><br><br><b>Search: </b><input type='text' class='search' id='t_".$tableid."' placeholder='Type a keyword'></input><table class='table' id=table_".$i."><caption>Placement Record for $branches[$i]_BE</caption><thead><th><b>Student ID</b></th><th><b>Student Name</b></th><th><b>Gender</b></th><th><b>Student Branch</b></th><th><b>Category</b></th><th><b>CGPA</b></th><th class='noExl'><b>Status</b></th><th><b>1st Company</b></th><th><b>Package (in LPA)</b></th><th><b>2nd Company</b></th><th><b>Package (in LPA)</b></th><th><b>3rd Company</b></th><th><b>Package (in LPA)</b></th><th class='noExl'><b>Eligible</b></th><th class='noExl'><b>Blocked?</b></th></thead>";
		while($row=$result->fetch_assoc()) {
			$id=$row['sid'];
			$placed="";
            $notplaced="";
			$placedppo="";
            $higherstudies="";
			$placedstatus=$row['status'];
			if($placedstatus=="PLACED")
				$placed="selected";
			if($placedstatus=="PLACED (PPO)")
				$placedppo="selected";
			if($placedstatus=="NOT PLACED")
				$notplaced="selected";
			if($placedstatus=="HIGHER STUDIES")
				$higherstudies="selected";
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
			$rethtml = $rethtml."<tr><td id='sid:$id'>".$row['sid']."</td><td id='student_name:$id'>".$row['student_name']."</td><td id='gender:$id'>".$row['gender']."</td><td id='student_branch:$id'>".$row['student_branch']."</td><td id='student_branch:$id'>".$row['category']."</td><td contenteditable='true' id='cgpa:$id'>".$row['cgpa']."</td><td contenteditable='true' class='noExl' id='status:$id'><select name='status' class='status'><option value='NOT PLACED' $notplaced>Not Placed</option><option value='PLACED' $placed>Placed</option><option value='PLACED (PPO)' $placedppo>Placed (PPO)</option><option value='HIGHER STUDIES' $higherstudies>Higher Studies</option></select></td><td contenteditable='true' id='company1:$id'>".$row['company1']."</td><td contenteditable='true' id='package1:$id'>".$row['package1']."</td><td contenteditable='true' id='company2:$id'>".$row['company2']."</td><td contenteditable='true' id='package2:$id'>".$row['package2']."</td><td contenteditable='true' id='company3:$id'>".$row['company3']."</td><td contenteditable='true' id='package3:$id'>".$row['package3']."</td><td contenteditable='true' class='noExl' id='eligible_further:$id'><select name='eligible' class='eligible'><option value='YES' $eligible>Eligible</option><option value='NO' $noteligible>Not Eligible</option></select></td><td contenteditable='true' class='noExl' id='blocked:$id'><select name='blocked' class='blocked'><option value='Y' $blocked>Blocked</option><option value='N' $notblocked>Not Blocked</option></select></td>";
		    
		}
        $rethtml = $rethtml."</table><button id='export_".$tableid."' data-export='export' onclick=download('".$tableid."')>Download Info</button></div>";
		
		$i++;
	}
	
$mysqli->close();
echo $rethtml;
?>