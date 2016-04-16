<?php

session_start();

$rethtml = "";

$sql = "SELECT * from company_contact where company_id='".$_SESSION['cid']."'";

$result = $mysqli->query($sql);

if($result->num_rows > 0) {
	
	$rethtml = "<div class='container'>";
	while($row=$result->fetch_assoc()) {
		$rethtml = $rethtml."<h3>Contact Name: </h3>".$row['contact_name']."<br><br><h3>Contact Designation: </h3>".$row['contact_desig']."<br><br><h3>Contact E-mail: </h3>".$row['contact_email']."<br><br><h3>Contact Number: </h3>".$row['contact_contact']."<br><br><h3>Contact Number_2: </h3>".$row['contact_contact2']."<br><br><h3>Contact Address: </h3>".$row['contact_addr']."</div>";
	}
}
$mysqli->close();
echo $rethtml;
?>