<?php
session_start();
include '../db_connection.php';
$ann= $_POST['ann'];
$company=$_POST['company'];
$branches=array();
$branchesbeint=array();
$c = 0;
$trades="";
$branchesme=array();
$d = 0;
$tradesme="";
$tradesbeint="";
if(isset($_POST["aero"]) && $_POST["aero"] == 'Aerospace')
{	$branches[$c]="Aerospace";
    $c++;
}
if(isset($_POST["civil"]) && $_POST["civil"] == 'Civil')
{	$branches[$c]="Civil";
    $c++;
}
if(isset($_POST["cse"]) && $_POST["cse"] == 'Computer Science')
{$branches[$c]="Computer Science";
$c++;
}
if(isset($_POST["ece"]) && $_POST["ece"] == 'Electronics and Communication'){
	$branches[$c]="Electronics and Communication";
	$c++;
}
if(isset($_POST["ee"]) && $_POST["ee"] == 'Electrical'){
	$branches[$c]="Electrical";
    $c++;
	}
if(isset($_POST["mech"]) && $_POST["mech"] == 'Mechanical'){
	$branches[$c]="Mechanical";
	$c++;
}
if(isset($_POST["meta"]) && $_POST["meta"] == 'Metallurgy'){
	$branches[$c]="Metallurgy";
    $c++;
	}
if(isset($_POST["prod"]) && $_POST["prod"] == 'Production'){
	$branches[$c]="Production";
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
if(isset($_POST["aeroint"]) && $_POST["aeroint"] == 'Aerospace')
{	$branchesbeint[$c]="Aerospace";
    $c++;
}
if(isset($_POST["civilint"]) && $_POST["civilint"] == 'Civil')
{	$branchesbeint[$c]="Civil";
    $c++;
}
if(isset($_POST["cseint"]) && $_POST["cseint"] == 'Computer Science')
{$branchesbeint[$c]="Computer Science";
$c++;
}
if(isset($_POST["eceint"]) && $_POST["eceint"] == 'Electronics and Communication'){
	$branchesbeint[$c]="Electronics and Communication";
	$c++;
}
if(isset($_POST["eeint"]) && $_POST["eeint"] == 'Electrical'){
	$branchesbeint[$c]="Electrical";
    $c++;
	}
if(isset($_POST["mechint"]) && $_POST["mechint"] == 'Mechanical'){
	$branchesbeint[$c]="Mechanical";
	$c++;
}
if(isset($_POST["metaint"]) && $_POST["metaint"] == 'Metallurgy'){
	$branchesbeint[$c]="Metallurgy";
    $c++;
	}
if(isset($_POST["prodint"]) && $_POST["prodint"] == 'Production'){
	$branchesbeint[$c]="Production";
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
if(isset($_POST["meind"]) && $_POST["meind"] == 'Industrial Material Metallurgy')
{$branchesme[$c]="Industrial Material Metallurgy";
$c++;
}
if(isset($_POST["mecivilwr"]) && $_POST["mecivilwr"] == 'Civil (Water Resources)'){
	$branchesme[$c]="Civil (Water Resources)";
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
if(isset($_POST["meprod"]) && $_POST["meprod"] == 'Production'){
	$branchesme[$c]="Production";
    $c++;
	}
if(isset($_POST["meee"]) && $_POST["meee"] == 'Electrical'){
	$branchesme[$c]="Electrical";
    $c++;
	}
if(isset($_POST["mecivilstru"]) && $_POST["mecivilstru"] == 'Civil (Structure)'){
	$branchesme[$c]="Civil (Structure)";
    $c++;
	}
if(isset($_POST["meecevlsi"]) && $_POST["meecevlsi"] == 'Electronics (VLSI)'){
	$branchesme[$c]="Electronics (VLSI)";
    $c++;
	}
if(isset($_POST["mecse"]) && $_POST["mecse"] == 'Computer Science'){
	$branchesme[$c]="Computer Science";
    $c++;
	}
if(isset($_POST["meinddes"]) && $_POST["meinddes"] == 'Industrial Design'){
	$branchesme[$c]="Industrial Design";
    $c++;
	}
if(isset($_POST["memech"]) && $_POST["memech"] == 'Mechanical'){
	$branchesme[$c]="Mechanical";
    $c++;
	}
if(isset($_POST["meis"]) && $_POST["meis"] == 'Computer Science (Information Security)'){
	$branchesme[$c]="Computer Science (Information Security)";
    $c++;
	}
if(isset($_POST["meece"]) && $_POST["meece"] == 'Electronics'){
	$branchesme[$c]="Electronics";
    $c++;
	}
if(isset($_POST["metqem"]) && $_POST["metqem"] == 'TQEM'){
	$branchesme[$c]="TQEM";
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
$sql="INSERT INTO announcements (date,announcement,company_name,branches_be,branches_me,branches_beint) values (curdate(),'".$ann."','".$company."','".$trades."','".$tradesme."','".$tradesbeint."')";
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