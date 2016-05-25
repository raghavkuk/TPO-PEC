<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT * from announcements order by aid desc";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<h3>Announcements</h3>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml.$row['announcement']."<br>";
		}
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>