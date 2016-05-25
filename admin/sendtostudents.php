<?php
session_start();
include '../db_connection.php';
$branchesbe=array();
$branchesme=array();
$id=$_GET['jafid'];
$sql="update jaf_details set reviewed=reviewed+1 where JAF_id=$id";
if($mysqli->query($sql)==TRUE)
{
	echo "Successful";
}
else
{
	echo "Failed";
}
header('Location:newcompany.php?sent=success');
?>