<?php
session_start();
$company=$_GET['company'];
include '../db_connection.php';
$rethtml="";
$sql="SELECT dateofvisit,ctc,gross from jaf_details where company_name='$company' AND dateofdept < curdate() AND dateofdept!='0000-00-00' AND reviewed!='0' AND removed='0' AND jobtype='Placement' and programme like '%ME%'";
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
$sql="SELECT student_branch,gender from placementdetails_me where company1='$company' OR company2='$company' OR company3='$company'";
//echo $sql;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml=$rethtml."<h4><b>Total Students Hired:</b> ".$result->num_rows."</h4>";
	$males=0;
	$females=0;
	$meind=0;
$mecivilwr=0;
$meenv=0;
$metran=0;
$meprod=0;
$meee=0;
$mecivilstru=0;
$meecevlsi=0;
$mecse=0;
$meinddes=0;
$memech=0;
$meis=0;
$meece=0;
$metqem=0;
	while($row=$result->fetch_assoc()) {
		if($row['gender']=="Male")
			$males++;
		else
			$females++;
		if($row['student_branch']=="Industrial Material Metallurgy")
			$meind++;
		if($row['student_branch']=="Civil (Water Resources)")
			$mecivilwr++;
		if($row['student_branch']=="Environmental Engineering")
			$meenv++;
		if($row['student_branch']=="Transportation Engineering")
			$metran++;
		if($row['student_branch']=="Production")
			$meprod++;
		if($row['student_branch']=="Elctrical")
			$meee++;
		if($row['student_branch']=="Civil (Structure)")
			$mecivilstru++;
		if($row['student_branch']=="Electronics (VLSI)")
			$meecevlsi++;
		if($row['student_branch']=="Computer Science")
			$mecse++;
		if($row['student_branch']=="Industrial Design")
			$meinddes++;
		if($row['student_branch']=="Mechanical")
			$memech++;
		if($row['student_branch']=="Computer Science (Information Security)")
			$meis++;
		if($row['student_branch']=="Electronics")
			$meece++;
		if($row['student_branch']=="TQEM")
			$metqem++;
		
	}
	$rethtml=$rethtml."<h4><b>Males hired:</b> $males</h4><h4><b>Females hired:</b> $females</h4>";
	$rethtml=$rethtml."<table class='table' id='branchwise'><thead><th>Branch</th><th>Number of Students hired</th></thead>
	<tbody>
	<tr><td>Industrial Material Metallurgy</td><td>$meind</td></tr>
	<tr><td>Civil (Water Resources)</td><td>$mecivilwr</td></tr>
	<tr><td>Environmental Engineering</td><td>$meenv</td></tr>
	<tr><td>Transportation Engineering</td><td>$metran</td></tr>
	<tr><td>Production</td><td>$meprod</td></tr>
	<tr><td>Elctrical</td><td>$meee</td></tr>
	<tr><td>Civil (Structure)</td><td>$mecivilstru</td></tr>
	<tr><td>Electronics (VLSI)</td><td>$meecevlsi</td></tr>
	<tr><td>Computer Science</td><td>$mecse</td></tr>
	<tr><td>Industrial Design</td><td>$meinddes</td></tr>
	<tr><td>Mechanical</td><td>$memech</td></tr>
	<tr><td>Computer Science (Information Security)</td><td>$meis</td></tr>
	<tr><td>Electronics</td><td>$meece</td></tr>
	<tr><td>TQEM</td><td>$metqem</td></tr>
	</tbody>
	</table>";
}
$mysqli->close();
echo $rethtml;
?>