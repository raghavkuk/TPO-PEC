<?php

include '../db_connection.php';

$token = $_POST['registration_token'];
$sid = $_POST['sid'];
$branch = $_POST['student_branch'];

$gcm_table = 'gcm_registrations';

echo $token;
echo $sid;

$reg_query = "INSERT INTO ".$gcm_table." (sid, token, branch) VALUES ('".$sid."', '".$token."', '".$branch."')";
echo $reg_query;
$reg_result = $mysqli->query($reg_query);



?>