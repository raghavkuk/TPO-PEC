<?php
$filename="";
if(isset($_GET['filename']))
{
	$filename=$_GET['filename'];
}
$filename2="";
include '../db_connection.php';
$sql = "SELECT filename from cvs where cv_id=$filename";	
$filename="../cvs/";
$result = $mysqli->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$filename2=$row['filename'];
	}
}
$filename=$filename.$filename2;
if($filename!="")
{
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filename).'"');
	header('Content-Length:'.filesize($filename));
	readfile($filename);
}
?>