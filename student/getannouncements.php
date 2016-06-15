<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="";
$jafquery="";
if($_SESSION['applied']!="")
	$jafquery=" or jaf_id IN (".$_SESSION['applied'].")";
if($_SESSION['loginprog']=="BE")
$sql="SELECT * from announcements where branches_be like '%".$_SESSION['branch']."%'".$jafquery." order by aid desc";
if($_SESSION['loginprog']=="BEINT")
$sql="SELECT * from announcements where branches_beint like '%".$_SESSION['branch']."%'".$jafquery." order by aid desc";
if($_SESSION['loginprog']=="ME")
$sql="SELECT * from announcements where branches_me like '%".$_SESSION['branch']."%'".$jafquery." order by aid desc";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<h3 align='center'>Announcements</h3><table class='table'><thead><th>Timestamp (YYYY-MM-DD Hrs:Min:Sec)</th><th>Announcement</th></thead><tbody>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td>".$row['timestamp']."</td><td>".$row['announcement']."</td><tr>";
		}
		$rethtml=$rethtml."</tbody></table>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>