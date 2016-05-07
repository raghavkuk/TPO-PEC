<?php

session_start();

include '../db_connection.php';
$_SESSION['about'] = 0;

$name = $_POST['name'];
$about = $_POST['about'];
$sector = $_POST['sector'];

$sql="INSERT into companies (company_id,company_name,company_about,industry_sector) values('".$_SESSION['cid']."','".$name."','".$about."','".$sector."')";

if ($mysqli->query($sql) === TRUE) {
	$_SESSION['about'] = 1;
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

$mysqli->close();
header('Location:fill-jaf.php');
?>