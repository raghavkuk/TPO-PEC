<?php

session_start();

include '../db_connection.php';

$rethtml = "";
$sno = 1;

$sql = "SELECT * from jaf_details where company_id='".$_SESSION['cid']."'";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {

	$rethtml="<div class='container table-responsive'><table class='table'>";

	while($row=$result->fetch_assoc()) {
		$filename = $_SESSION['cname']."_".$row['job_designation']."_PEC.pdf";
		$rethtml = $rethtml."<tr><td>".$sno.".   </td><td>".$row['job_designation']."</td><td><a href='downloadpdf.php?filename=".$filename."' target='_blank'>Download JAF</a></td></tr>";
	    $sno++;
	}

	$rethtml = $rethtml."</table>";
} else{
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>