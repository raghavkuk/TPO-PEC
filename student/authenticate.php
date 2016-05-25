<?php

include '../db_connection.php';

$username = $_POST["username"];
$password = $_POST["password"];

$login_table = "student_login";

$query = "SELECT sid FROM ".$login_table." WHERE username = '".$username."' AND password = '".$password."'";

$result = $mysqli->query($query);


if($result->num_rows == 1){

	session_start();
	$res_row = $result->fetch_row();
	$_SESSION["sid"] = $res_row[0];
	redirect("http://localhost/tpo-pec/student/home.php?sid=".$_SESSION['sid']);
	$result->close();

} else {
	echo "Username or password didn't match.";
}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   $mysqli->close();
}


?>