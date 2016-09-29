<?php
session_start();
include '../db_connection.php';
$cname= $_POST['cname'];
$cuser=$_POST['cuser'];
$cpass=$_POST['cpass'];
$sql="INSERT INTO company_login (company_name,company_username,company_password) values ('".$cname."','".$cuser."','".$cpass."')";
if ($mysqli->query($sql) === TRUE) {
	$_SESSION['statusadd']='success';
	header('Location:addcompany.php?status=success');
}
else
{
	  echo "Error: <br>" . $mysqli->error;
}
$mysqli->close();
?>