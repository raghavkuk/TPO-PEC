<?php
session_start();
$an=$_POST["aname"];
$ap=$_POST["apass"];

$con=mysqli_connect("localhost","root","");
   mysqli_select_db($con,"tpo");
   $query="SELECT * from admin_login where admin_username='".$an."' and admin_password='".$ap."'";
   $result = $con->query($query);
   if($result->num_rows>0)
   {
	  
	header('Location: newcompany.php');
   }
   else
   {
	   header('Location: admin-login.php?status=failed');
   }
   $_SESSION['statusadd']='failure';
$con->close();
?>