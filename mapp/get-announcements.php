<?php

include '../db_connection.php';

$sid = $_POST['sid'];
$branch = $_POST['student_branch'];

$aannouncement_table = "announcements";

$aannouncement_query = 'SELECT * FROM '.$aannouncement_table.' WHERE branches_be LIKE "%'.$branch.'%"';
$announcement_result = $mysqli->query($aannouncement_query);


$response = array();

while($announcement = $announcement_result->fetch_assoc()) {

    $tmp = array();
    $tmp['company_name'] = $announcement['company_name'];
    $tmp['msg'] = $announcement['announcement'];
    $tmp['date'] = $announcement['date'];

    array_push($response, $tmp); 
}

echo json_encode($response);
$mysqli->close();

?>