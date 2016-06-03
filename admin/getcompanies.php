<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT company_name, company_username, company_password from company_login";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
$rethtml = $rethtml."<button id='export' data-export='export' onclick=download()>Download Info</button><h3>Companies @ PEC</h3><div class='table-responsive'><b>Search: </b><input type='text' class='search' id='t_comp' placeholder='Type a keyword'></input><table class='table' id='comp'><caption>Companies</caption><thead><td><b>Company Name</b></td><td><b>Company Username</b></td><td><b>Company Password</b></td></thead>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<tr><td class='data'>".$row['company_name']."</td><td class='data'>".$row['company_username']."</td><td class='data'>".$row['company_password']."</td></tr>";
		
		}

		$rethtml = $rethtml."</table></div>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>