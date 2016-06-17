<?php
include '../db_connection.php';
session_start();
$an=$_POST["aname"];
$ap=$_POST["apass"];

   
   $query="SELECT * from admin_login where admin_username='".$an."' and admin_password='".$ap."'";
   $result = $mysqli->query($query);
   if($result->num_rows>0)
   {
	  
	header('Location: newcompany.php');
   }
   else
   {
	   header('Location: admin-login.php?status=failed');
   }
   $_SESSION['statusadd']='failure';
$mysqli->close();
?>