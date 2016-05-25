<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$sql="SELECT company_name,JAF_id from jaf_details where dateofvisit>curdate()";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{       $rethtml=$rethtml."<select class='form-control input-lg' id='company' name='company' required='true'><option value='None'>No specific Company</option>";
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<option value='".$row['company_name']."'>".$row['company_name']."</option>";
		}

		$rethtml = $rethtml."</select>";
		}
		 else {
	$rethtml="<h3>Sorry! No records found.</h3>";
}
	
$mysqli->close();
echo $rethtml;
?>