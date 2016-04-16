<?php

session_start();

include '../db_connection.php';

$rethtml = "";

$sql = "SELECT * from companies where company_id='".$_SESSION['cid']."'";

$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	
	$rethtml = "<div class='container'>";;
	while($row = $result->fetch_assoc()) {
		$rethtml = $rethtml."<h3>Company Name: </h3>".$row['company_name']."<br><br><h3>About Company: </h3>".$row['company_about']."<br><br><h3>Industry Sector: </h3>".$row['industry_sector']."</div>";
	}
}
$mysqli->close();
echo $rethtml;
?>