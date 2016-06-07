<?php

session_start();
include '../db_connection.php';

$rethtml = "";
$i = 0;
$applicaitons_table = "applications";
$sql = "SELECT * from ".$applicaitons_table." where sid='".$_SESSION['sid']."'";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	$rethtml=$rethtml."<table class='table'><thead><th>Company</th><th>Job profile</th><th>Date and Time</th></thead><tbody>";
	while($row = $result->fetch_assoc()) {
		$rethtml=$rethtml."<tr><td>".$row['company_name']."</td><td>".$row['job_designation']."</td><td>".$row['date_of_application']."</td>";
	}
}
else
	$rethtml="<h3>Sorry no applications found!</h3>";
$mysqli->close();
echo $rethtml;
?>

