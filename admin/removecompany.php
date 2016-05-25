<?php
session_start();
include '../db_connection.php';
$id=$_GET['jafid'];
$sql="update jaf_details set removed='1' where JAF_id='$id'";
if ($mysqli->query($sql) === TRUE) {
header('Location:companiesvisiting.php?deleted=true');
}
else
{
	  echo "Error: Removing Company Try Again..";
}
$mysqli->close();

?>