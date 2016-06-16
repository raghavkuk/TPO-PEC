<?php

include '../db_connection.php';

$sid = $_POST['sid'];
$password = $_POST['password'];
$programme = $_POST['student_programme'];

if($programme == "BE Final Year"){
	$programme = "BE";
}

$login_table = "student_login";

$query = "SELECT sid, password, branch, student_name, programme FROM ".$login_table." WHERE username = '".$sid."' AND password = '".$password."' AND programme = '".$programme."'";

$result = $mysqli->query($query);


if($result->num_rows >= 0){

	$res_row = $result->fetch_assoc();

	$response = array();
	$response["sid"] = $res_row['sid'];
	$response["password"] = $res_row['password'];
	$response['branch'] = $res_row['branch'];
	$response['student_name'] = $res_row['student_name'];
	$response['student_programme'] = $res_row['programme'];

	echo json_encode($response);
	$result->close();

} else {
	echo "SID or Password didn't match.";
}

?>