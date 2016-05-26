<?php

include '../db_connection.php';

$sid = $_POST['sid'];

$cv_table = "cvs";


$cv_query = "SELECT cv_id, filename FROM ".$cv_table." WHERE sid = ".$sid;
$cv_result = $mysqli->query($cv_query);

$i = 0;

$response = array();
echo "[";

while($cv = $cv_result->fetch_assoc()) {

	$response[] = $cv;
	echo json_encode($cv);
	echo ",";
    
}
echo "]";
//echo json_encode($response);
$cv_result->close();

?>