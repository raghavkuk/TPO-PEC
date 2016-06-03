<?php
header('Content-Type: text/xml');
session_start();
include '../db_connection.php';
$cgpa=$_GET['cgpa'];
$branch=$_GET['branch'];
$gender=$_GET['gender'];
$branchquery="";
$genderquery="";
if($branch=='All')
	$branchquery="";
else
	$branchquery=" AND student_branch='".$branch."'";
if($gender=='Both')
	$genderquery="";
else
	$genderquery=" AND gender='".$gender."'";
$retxml = "<numbers>";
$sql="SELECT count(*) as placed from placementdetails_beint where status='GOT INTERNSHIP' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<placedbeint>".$row['placed']."</placedbeint>";
		}
}
$sql="SELECT count(*) as notplaced from placementdetails_beint where status='NOT YET' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<notplacedbeint>".$row['notplaced']."</notplacedbeint>";
		}
}
$retxml = $retxml."</numbers>";
$mysqli->close();
echo $retxml;
?>