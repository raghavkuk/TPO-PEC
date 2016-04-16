<?php

include '../db_connection.php';

$company_name = $_POST["cname"];
$company_password = $_POST["cpass"];

$company_login_table = "company_login";

$query="SELECT COUNT(*) from company_login where company_username='".$company_name."' and company_password='".$company_password."'";
$result = $mysqli->query($query);

if($result->num_rows > 0)
	header('Location: company-dashboard.html');

?>