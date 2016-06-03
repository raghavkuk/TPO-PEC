<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT * from announcements order by aid desc";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<h3>Announcements</h3><b>Search: </b><input type='text' class='search' id='t_ann' placeholder='Type a keyword'></input><div class='table-responsive'><table class='table' id='ann'><caption>Announcements sent</caption><thead><th><b>Date/Time</b></th><th><b>Announcement</b></th><th><b>To the Applicants of</b></th><th><b>To these branches (BE Placement)</b></th><th><b>To these branches (BE Internship)</b></th><th><b>To these branches (ME)</b></th></thead>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['timestamp']."</td><td class='data'>".$row['announcement']."</td><td class='data'>".$row['company_name']."</td><td class='data'>".$row['branches_be']."</td><td class='data'>".$row['branches_beint']."</td><td>".$row['branches_me']."</td></tr>";		
		}

		$rethtml = $rethtml."</table></div>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>