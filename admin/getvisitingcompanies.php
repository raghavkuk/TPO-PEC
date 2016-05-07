<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT JAF_id, company_id, company_name, dateofvisit from jaf_details where reviewed!='0'";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<div class='table-responsive'><table class='table' id='comp'><caption>Companies to Visit</caption><thead><td><b>Company Name</b></td><td><b>Date of Visit</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data'>".$row['dateofvisit']."</td></tr>";
		
		}
		$rethtml = $rethtml."</table></div>";
}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
/*$myfile = fopen("newfile.html", "w") or die("Unable to open file!");
fwrite($myfile, $rethtml);
fclose($myfile);
rename("newfile.html","newfile.doc");*/
$mysqli->close();
echo $rethtml;
?>