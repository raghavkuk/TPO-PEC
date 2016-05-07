<?php
$filename="";
if(isset($_GET['filename']))
{
	$filename=$_GET['filename'];
}	
if($filename!="")
{
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($filename).'"');
	header('Content-Length:'.filesize($filename));
	readfile($filename);
}
?>