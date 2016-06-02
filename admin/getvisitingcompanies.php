<?php
session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT JAF_id, company_id, company_name, dateofvisit, dateofdept, jobtype, cgpa, branches_be, branches_me from jaf_details where reviewed!='0' and dateofvisit>=curdate() and removed='0' order by dateofvisit";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
	$rethtml = $rethtml."<div class='table-responsive'><table class='table' id='comp'><caption>Companies to Visit</caption><thead><td><b>Company Name</b></td><td><b>Date of Visit (MM-DD-YYYY)</b></td><td><b>Date of Departure (MM-DD-YYYY)</b></td><td><b>Purpose</b></td><td><b>Branches Allowed</b></td><td><b>Minimum criteria (CGPA)</b></td><td><b>Refresh</b></td><td><b>Remove Company</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$id=$row['JAF_id'];
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data' contenteditable='true' id='dateofvisit:$id'><input type='date' class='date' value='".$row['dateofvisit']."'></input></td><td class='data' contenteditable='true' id='dateofdept:$id'><input type='date' class='date' value='".$row['dateofdept']."'></input></td><td class='data' contenteditable='true' id='jobtype:$id'>".$row['jobtype']."</td><td class='data' id='branches:$id'><b>BE: </b>".$row['branches_be'].",<b>ME: </b>".$row['branches_me']."</td><td class='data' id='cgpa:$id'>".$row['cgpa']."</td><td><button onclick='refresh()'>Refresh</button></td><td><button onclick='preview($id)'>Remove Company</button></td></tr>";
		
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