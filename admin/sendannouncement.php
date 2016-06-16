<?php
session_start();
include '../db_connection.php';
$ann= $_POST['ann'];
$jafid=$_POST['company'];
$branches=array();
$branchesbeint=array();
$c = 0;
$trades="";
$branchesme=array();
$d = 0;
$tradesme="";
$tradesbeint="";
if(isset($_POST["aero"]) && $_POST["aero"] == 'Aerospace Engineering')
{	$branches[$c]="Aerospace Engineering";
    $c++;
}
if(isset($_POST["civil"]) && $_POST["civil"] == 'Civil Engineering')
{	$branches[$c]="Civil Engineering";
    $c++;
}
if(isset($_POST["cse"]) && $_POST["cse"] == 'Computer Science and Engineering')
{$branches[$c]="Computer Science and Engineering";
$c++;
}
if(isset($_POST["ece"]) && $_POST["ece"] == 'Electronics and Communication Engineering'){
	$branches[$c]="Electronics and Communication Engineering";
	$c++;
}
if(isset($_POST["ee"]) && $_POST["ee"] == 'Electrical Engineering'){
	$branches[$c]="Electrical Engineering";
    $c++;
	}
if(isset($_POST["mech"]) && $_POST["mech"] == 'Mechanical Engineering'){
	$branches[$c]="Mechanical Engineering";
	$c++;
}
if(isset($_POST["meta"]) && $_POST["meta"] == 'Materials and Metallurgical Engineering'){
	$branches[$c]="Materials and Metallurgical Engineering";
    $c++;
	}
if(isset($_POST["prod"]) && $_POST["prod"] == 'Production and Industrial Engineering'){
	$branches[$c]="Production and Industrial Engineering";
    $c++;
	}
	$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$trades=$trades.$branches[$i].",";
		$i++;
	}
	$trades=$trades.$branches[$i];
}
$c=0;
if(isset($_POST["aeroint"]) && $_POST["aeroint"] == 'Aerospace Engineering')
{	$branchesbeint[$c]="Aerospace Engineering";
    $c++;
}
if(isset($_POST["civilint"]) && $_POST["civilint"] == 'Civil Engineering')
{	$branchesbeint[$c]="Civil Engineering";
    $c++;
}
if(isset($_POST["cseint"]) && $_POST["cseint"] == 'Computer Science and Engineering')
{$branchesbeint[$c]="Computer Science and Engineering";
$c++;
}
if(isset($_POST["eceint"]) && $_POST["eceint"] == 'Electronics and Communication Engineering'){
	$branchesbeint[$c]="Electronics and Communication Engineering";
	$c++;
}
if(isset($_POST["eeint"]) && $_POST["eeint"] == 'Electrical Engineering'){
	$branchesbeint[$c]="Electrical Engineering";
    $c++;
	}
if(isset($_POST["mechint"]) && $_POST["mechint"] == 'Mechanical Engineering'){
	$branchesbeint[$c]="Mechanical Engineering";
	$c++;
}
if(isset($_POST["metaint"]) && $_POST["metaint"] == 'Materials and Metallurgical Engineering'){
	$branchesbeint[$c]="Materials and Metallurgical Engineering";
    $c++;
	}
if(isset($_POST["prodint"]) && $_POST["prodint"] == 'Production and Industrial Engineering'){
	$branchesbeint[$c]="Production and Industrial Engineering";
    $c++;
	}
	$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$tradesbeint=$tradesbeint.$branchesbeint[$i].",";
		$i++;
	}
	$tradesbeint=$tradesbeint.$branchesbeint[$i];
}
$c=0;
if(isset($_POST["meind"]) && $_POST["meind"] == 'Industrial Materials and Metallurgy')
{$branchesme[$c]="Industrial Materials and Metallurgy";
$c++;
}
if(isset($_POST["mecivilwr"]) && $_POST["mecivilwr"] == 'Civil (Irrigation and Hydraulics)'){
	$branchesme[$c]="Civil (Irrigation and Hydraulics)";
	$c++;
}
if(isset($_POST["mecivilhigh"]) && $_POST["mecivilhigh"] == 'Civil (Highways)'){
	$branchesme[$c]="Civil (Highways)";
	$c++;
}
if(isset($_POST["meenv"]) && $_POST["meenv"] == 'Environmental Engineering'){
	$branchesme[$c]="Environmental Engineering";
    $c++;
	}
if(isset($_POST["metran"]) && $_POST["metran"] == 'Transportation Engineering'){
	$branchesme[$c]="Transportation Engineering";
	$c++;
}
if(isset($_POST["meprod"]) && $_POST["meprod"] == 'Production and Industrial Engineering'){
	$branchesme[$c]="Production and Industrial Engineering";
    $c++;
	}
if(isset($_POST["meee"]) && $_POST["meee"] == 'Electrical Engineering'){
	$branchesme[$c]="Electrical Engineering";
    $c++;
	}
if(isset($_POST["mecivilstru"]) && $_POST["mecivilstru"] == 'Civil Engineering (Structures)'){
	$branchesme[$c]="Civil Engineering (Structures)";
    $c++;
	}
if(isset($_POST["meecevlsi"]) && $_POST["meecevlsi"] == 'Electronics (VLSI) Engineering'){
	$branchesme[$c]="Electronics (VLSI) Engineering";
    $c++;
	}
if(isset($_POST["mecse"]) && $_POST["mecse"] == 'Computer Science and Engineering'){
	$branchesme[$c]="Computer Science and Engineering";
    $c++;
	}
if(isset($_POST["meinddes"]) && $_POST["meinddes"] == 'Industrial Design Engineering'){
	$branchesme[$c]="Industrial Design Engineering";
    $c++;
	}
if(isset($_POST["memech"]) && $_POST["memech"] == 'Mechanical'){
	$branchesme[$c]="Mechanical Engineering";
    $c++;
	}
if(isset($_POST["meis"]) && $_POST["meis"] == 'Computer Science and Engineering (Information Security)'){
	$branchesme[$c]="Computer Science and Engineering (Information Security)";
    $c++;
	}
if(isset($_POST["meece"]) && $_POST["meece"] == 'Electronics'){
	$branchesme[$c]="Electronics Engineering";
    $c++;
	}
if(isset($_POST["metqem"]) && $_POST["metqem"] == 'Total Quality Engineering and Management'){
	$branchesme[$c]="Total Quality Engineering and Management";
    $c++;
	}
$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$tradesme=$tradesme.$branchesme[$i].",";
		$i++;
	}
	$tradesme=$tradesme.$branchesme[$i];
}
if($tradesme=="")
	$tradesme="NULL";
if($tradesbeint=="")
	$tradesbeint="NULL";
if($trades=="")
	$trades="NULL";
if($company=="None")
	$company="NULL";
$sql="INSERT INTO announcements (date,announcement,jaf_id,branches_be,branches_me,branches_beint) values (curdate(),'".$ann."','".$jafid."','".$trades."','".$tradesme."','".$tradesbeint."')";
if ($mysqli->query($sql) === TRUE) {
	$_SESSION['statusann']='success';
header('Location:add-announcement.php?status=success');
}
else
{
	  echo "Error: <br>" . $mysqli->error;
}

if($_SESSION['statusann'] == 'success'){

$gcm_table = "gcm_registrations";
	// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyAz7bgKV-EbYxplyaCmOVERJ4OSXONFWuE' );

$registrationIds = array( $_GET['id'] );

for($i=0; $i<sizeof($branches); $i++){
	$regIdQuery = 'SELECT token FROM '.$gcm_table.' WHERE branch LIKE "%'.$branches[i].'%"';
	$regResult = $mysqli->query($regIdQuery);
	while($regId = $regResult->fetch_assoc()){
		$rid = $regId['token'];
		array_push($registrationIds, $rid);
	}
}

for($i=0; $i<sizeof($branchesbeint); $i++){
	$regIdQuery = 'SELECT token FROM '.$gcm_table.' WHERE branch LIKE "%'.$branchesbeint[i].'%"';
	$regResult = $mysqli->query($regIdQuery);
	while($regId = $regResult->fetch_assoc()){
		$rid = $regId['token'];
		array_push($registrationIds, $rid);
	}
}

for($i=0; $i<sizeof($branchesme); $i++){
	$regIdQuery = 'SELECT token FROM '.$gcm_table.' WHERE branch LIKE "%'.$branchesme[i].'%"';
	$regResult = $mysqli->query($regIdQuery);
	while($regId = $regResult->fetch_assoc()){
		$rid = $regId['token'];
		array_push($registrationIds, $rid);
	}
}


    // prep the bundle
$msg = array
(
    'message'   => $ann,
    'title'     => 'This is a title. title',
    'subtitle'  => 'This is a subtitle. subtitle',
    'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
    'vibrate'   => 1,
    'sound'     => 1,
    'largeIcon' => 'large_icon',
    'smallIcon' => 'small_icon'
);
$fields = array
(
    'registration_ids'  => $registrationIds,
    'data'          => $msg
);

 
$headers = array
(
    'Authorization: key=' . API_ACCESS_KEY,
    'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
}
$mysqli->close();
?>