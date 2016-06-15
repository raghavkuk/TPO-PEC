<?php

session_start();
include '../db_connection.php';
$rethtml = "";
$rethtml=$rethtml."<select class='form-control input-lg' id='company' name='company' required='true'><option value='None'>No specific Company</option>";
$sql="SELECT company_name,jobtype,JAF_id from jaf_details where reviewed!='0' AND removed='0' ";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{       
		while($row=$result->fetch_assoc()) {
			$rethtml = $rethtml."<option value='".$row['JAF_id']."'>".$row['company_name']." (".$row['jobtype'].")</option>";
		}

		$rethtml = $rethtml."</select>";
		}
		 else {
	$rethtml=$rethtml."</select>";
}
	
$mysqli->close();
echo $rethtml;
?>