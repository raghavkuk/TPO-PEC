<?php
session_start();
include '../db_connection.php';

$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
$programme= $_POST["prog"];
$_SESSION['loginprog']=$programme;
$login_table = "student_login";
$pt="";
if($programme=="BE")
	$pt="placementdetails_be";
if($programme=="BEINT")
	$pt="placementdetails_beint";
if($programme=="ME")
	$pt="placementdetails_me";
$query="SELECT blocked from $pt where sid='$username'";
$blockstatus="N";
$result = $mysqli->query($query);
if($result->num_rows == 1){
	$res_row = $result->fetch_row();
	$blockstatus=$res_row[0];
}	
$query = "SELECT sid FROM ".$login_table." WHERE username = '".$username."' AND password = '".$password."' AND programme = '".$programme."'";

$result = $mysqli->query($query);


if($result->num_rows == 1 && $blockstatus=="N"){

	
	$res_row = $result->fetch_row();
	$_SESSION["sid"] = $res_row[0];
	redirect("http://localhost/tpo-pec/student/home.php?sid=".$_SESSION['sid']);
	$result->close();

} else if($blockstatus=="Y")
{
	header('Location: login.php?status=frozen');
}	
else
{
   
	header('Location: login.php?status=failed');
	//echo "Username or password didn't match.";
}

function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   $mysqli->close();
}


?>