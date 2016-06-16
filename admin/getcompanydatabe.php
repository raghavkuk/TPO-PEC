<?php
session_start();
$company=$_GET['company'];
include '../db_connection.php';
$rethtml="";
$sql="SELECT dateofvisit,ctc,gross from jaf_details where company_name='$company' AND dateofdept < curdate() AND dateofdept!='0000-00-00' AND reviewed!='0' AND removed='0' AND jobtype='Placement' and programme like '%BE%'";
//echo $sql;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$pkg=$row['ctc'];
			if($row['ctc']=="" && $row['gross']!="")
				$pkg=$row['gross'];
			$rethtml=$rethtml."<h4><b>Date of Visit:</b> ".$row['dateofvisit']."</h4><h4>Package: ".$pkg."</h4>";
		}
}
$sql="SELECT student_branch,gender from placementdetails_be where company1='$company' OR company2='$company' OR company3='$company'";
//echo $sql;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml=$rethtml."<h4><b>Total Students Hired:</b> ".$result->num_rows."</h4>";
	$males=0;
	$females=0;
	$aero=0;
	$civil=0;
	$cse=0;
	$ee=0;
	$ece=0;
	$mech=0;
	$mett=0;
	$prod=0;
	while($row=$result->fetch_assoc()) {
		if($row['gender']=="Male")
			$males++;
		else
			$females++;
		if($row['student_branch']=="Aerospace Engineering")
			$aero++;
		if($row['student_branch']=="Civil Engineering")
			$civil++;
		if($row['student_branch']=="Computer Science and Engineering")
			$cse++;
		if($row['student_branch']=="Electrical Engineering")
			$ee++;
		if($row['student_branch']=="Electronics and Communication Engineering")
			$ece++;
		if($row['student_branch']=="Mechanical Engineering")
			$mech++;
		if($row['student_branch']=="Materials and Metallurgical Engineering")
			$mett++;
		if($row['student_branch']=="Production and Industrial Engineering")
			$prod++;
	}
	$rethtml=$rethtml."<h4><b>Males hired:</b> $males</h4><h4><b>Females hired:</b> $females</h4>";
	$rethtml=$rethtml."<table class='table' id='branchwise'><thead><th>Branch</th><th>Number of Students hired</th></thead>
	<tbody>
	<tr><td>Aerospace Engineering</td><td>$aero</td></tr>
	<tr><td>Civil Engineering</td><td>$civil</td></tr>
	<tr><td>Computer Science and Engineering</td><td>$cse</td></tr>
	<tr><td>Electrical Engineering</td><td>$ee</td></tr>
	<tr><td>Electronics and Communication Engineering</td><td>$ece</td></tr>
	<tr><td>Mechanical Engineering</td><td>$mech</td></tr>
	<tr><td>Materials and Metallurgical</td><td>$mett</td></tr>
	<tr><td>Production and Industrial Engineering</td><td>$prod</td></tr>
	</tbody>
	</table>";
}
$mysqli->close();
echo $rethtml;
?>