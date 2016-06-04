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
		if($row['student_branch']=="Aerospace")
			$aero++;
		if($row['student_branch']=="Civil")
			$civil++;
		if($row['student_branch']=="Computer Science")
			$cse++;
		if($row['student_branch']=="Electrical")
			$ee++;
		if($row['student_branch']=="Electronics and Communication")
			$ece++;
		if($row['student_branch']=="Mechanical")
			$mech++;
		if($row['student_branch']=="Metallurgy")
			$mett++;
		if($row['student_branch']=="Production")
			$prod++;
	}
	$rethtml=$rethtml."<h4><b>Males hired:</b> $males</h4><h4><b>Females hired:</b> $females</h4>";
	$rethtml=$rethtml."<table class='table' id='branchwise'><thead><th>Branch</th><th>Number of Students hired</th></thead>
	<tbody>
	<tr><td>Aerospace</td><td>$aero</td></tr>
	<tr><td>Civil</td><td>$civil</td></tr>
	<tr><td>Computer Science</td><td>$cse</td></tr>
	<tr><td>Electrical</td><td>$ee</td></tr>
	<tr><td>Electronics and Communication</td><td>$ece</td></tr>
	<tr><td>Mechanical</td><td>$mech</td></tr>
	<tr><td>Mettalurgy</td><td>$mett</td></tr>
	<tr><td>Production</td><td>$prod</td></tr>
	</tbody>
	</table>";
}
$mysqli->close();
echo $rethtml;
?>