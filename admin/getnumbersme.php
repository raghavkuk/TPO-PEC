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
$sql="SELECT count(*) as placed from placementdetails_me where status='PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<placedme>".$row['placed']."</placedme>";
		}
}
$sql="SELECT count(*) as notplaced from placementdetails_me where status='NOT PLACED' AND cgpa>=$cgpa".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<notplacedme>".$row['notplaced']."</notplacedme>";
		}
}	
$sql="SELECT count(*) as studies from placementdetails_me where status='HIGHER STUDIES'".$branchquery.$genderquery;
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$retxml = $retxml."<studiesme>".$row['studies']."</studiesme>";
		}
}
$retxml = $retxml."</numbers>";
$mysqli->close();
echo $retxml;
?>