<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="select d.company_name, c.contact_name, c.contact_desig, c.contact_email, c.contact_contact, c.contact_contact2, c.contact_addr, d.company_username, d.company_password from company_contact c, company_login d where c.company_id=d.company_id";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<button id='export' data-export='export' onclick=download()>Download Info</button><div class='table-responsive'><table class='table' id='comp'><caption>Companies</caption><thead><td><b>Company Name</b></td><td><b>Contact Name</b></td><td><b>Contact Designation</b></td><td><b>Contact E-mail</b></td><td><b>Contact Phone</b></td><td><b>Contact Phone 2</b></td><td><b>Contact Address</b></td><td class='noExl'><b>Company Username</b></td><td class='noExl'><b>Company Password</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data'>".$row['contact_name']."</td><td class='data'>".$row['contact_desig']."</td><td class='data'>".$row['contact_email']."</td><td class='data'>".$row['contact_contact']."</td><td class='data'>".$row['contact_contact2']."</td><td class='data'>".$row['contact_addr']."</td><td class='noExl'>".$row['company_username']."</td><td class='noExl'>".$row['company_password']."</td></tr>";
		
		}

		$rethtml = $rethtml."</table></div>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>