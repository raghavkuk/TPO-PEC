<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT * from announcements order by aid desc";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<h3>Announcements</h3><div class='table-responsive'><table class='table' id='ann'><caption>Announcements sent</caption><thead><td><b>Announcement</b></td><td><b>To the Applicants of</b></td><td><b>To these branches (BE)</b></td><td><b>To these branches (ME)</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['announcement']."</td><td class='data'>".$row['company_name']."</td><td class='data'>".$row['branches_be']."</td><td>".$row['branches_me']."</td></tr>";		
		}

		$rethtml = $rethtml."</table></div>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>