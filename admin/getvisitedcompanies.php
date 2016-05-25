<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT JAF_id, company_id, company_name, dateofvisit, dateofdept from jaf_details where reviewed!='0' and dateofdept<curdate() and dateofdept!='0000-00-00' and removed='0' order by dateofvisit";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<div class='table-responsive'><table class='table' id='comp'><caption>Companies that have Visited the Campus</caption><thead><td><b>Company Name</b></td><td><b>Date of Visit</b></td><td><b>Date of Departure</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data'>".$row['dateofvisit']."</td><td class='data'>".$row['dateofdept']."</td></tr>";
		
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