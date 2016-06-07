<?php

session_start();
include '../db_connection.php';

$contactname = $_POST["contactname"];
$contactdesig = $_POST["contactdesig"];
$contactemail = $_POST["contactemail"];
$contactcontact = $_POST["contactcontact"];
$contactcontact2 = $_POST["contactcontact2"];
$contactaddr = $_POST["contactaddr"];

$sql = "INSERT into company_contact values('".$_SESSION['cid']."','".$contactname."','".$contactdesig."','".$contactemail."','".$contactcontact."','".$contactcontact2."','".$contactaddr."')";
if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
header('Location: contactdetails.php');
$mysqli->close();
?>