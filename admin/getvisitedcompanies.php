<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT JAF_id, company_id, company_name, dateofvisit, dateofdept, jobtype, cgpa, branches_be, branches_me from jaf_details where reviewed!='0' and dateofdept<curdate() and dateofdept!='0000-00-00' and removed='0' order by dateofvisit";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<div class='table-responsive'><table class='table' id='comp'><caption>Companies to Visit</caption><thead><td><b>Company Name</b></td><td><b>Date of Visit (MM-DD-YYYY)</b></td><td><b>Date of Departure (MM-DD-YYYY)</b></td><td><b>Purpose</b></td><td><b>Branches Allowed</b></td><td><b>Minimum criteria (CGPA)</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$id=$row['JAF_id'];
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data' id='dateofvisit:$id'>".$row['dateofvisit']."</td><td class='data' id='dateofdept:$id'>".$row['dateofdept']."</td><td class='data' id='jobtype:$id'>".$row['jobtype']."</td><td class='data' id='branches:$id'><b>BE: </b>".$row['branches_be'].",<b>ME: </b>".$row['branches_me']."</td><td class='data' id='cgpa:$id'>".$row['cgpa']."</td></tr>";
		
		}
		$rethtml = $rethtml."</table><button id='export_comp' onclick=download('comp')>Download Info</button></div>";
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