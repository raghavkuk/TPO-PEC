<?php
header('Content-Type: text/xml');
session_start();
$cgpa=$_GET['cgpa'];
$branch=$_GET['branch'];
$gender=$_GET['gender'];
include '../db_connection.php';
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
$sql="SELECT count(*) as placed from placementdetails_be where status='PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<placedbe>".$row['placed']."</placedbe>";
		}
}
$sql="SELECT count(*) as notplaced from placementdetails_be where status='NOT PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<notplacedbe>".$row['notplaced']."</notplacedbe>";
		}
}	
$sql="SELECT count(*) as studies from placementdetails_be where status='HIGHER STUDIES'".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<studiesbe>".$row['studies']."</studiesbe>";
		}
}
$sql="SELECT count(*) as studies from placementdetails_be where status='PLACED (PPO)'".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<placedppo>".$row['studies']."</placedppo>";
		}
}	
$retxml = $retxml."</numbers>";
$mysqli->close();
echo $retxml;
?>