<?php
header('Content-Type: text/xml');
session_start();
$company=$_GET['company'];
$retxml = "<numbers>";
$sql="SELECT company_id from companies where company_name like '%$company%'";
$result = $mysqli->query($sql);
if($result->num_rows > 0)
{
		while($row=$result->fetch_assoc()) {
			$id=$row['company_id'];
		}
}	