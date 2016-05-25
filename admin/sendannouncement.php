<?php
session_start();
include '../db_connection.php';
$ann= $_POST['ann'];
$company=$_POST['company'];
$branches=array();
$c = 0;
$trades="";
$branchesme=array();
$d = 0;
$tradesme="";
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
if(isset($_POST["meaero"]) && $_POST["meaero"] == 'Aerospace')
{	$branchesme[$c]="Aerospace";
    $c++;
}
if(isset($_POST["mecivil"]) && $_POST["mecivil"] == 'Civil')
{	$branchesme[$c]="Civil";
    $c++;
}
if(isset($_POST["mecse"]) && $_POST["mecse"] == 'Computer Science')
{$branchesme[$c]="Computer Science";
$c++;
}
if(isset($_POST["meece"]) && $_POST["meece"] == 'Electronics and Communication'){
	$branchesme[$c]="Electronics and Communication";
	$c++;
}
if(isset($_POST["meee"]) && $_POST["meee"] == 'Electrical'){
	$branchesme[$c]="Electrical";
    $c++;
	}
if(isset($_POST["memech"]) && $_POST["memech"] == 'Mechanical'){
	$branchesme[$c]="Mechanical";
	$c++;
}
if(isset($_POST["memeta"]) && $_POST["memeta"] == 'Metallurgy'){
	$branchesme[$c]="Metallurgy";
    $c++;
	}
if(isset($_POST["meprod"]) && $_POST["meprod"] == 'Production'){
	$branchesme[$c]="Production";
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
if($trades=="")
	$trades="NULL";
if($company=="None")
	$company="NULL";
$sql="INSERT INTO announcements (date,announcement,company_name,branches_be,branches_me) values (curdate(),'".$ann."','".$company."','".$trades."','".$tradesme."')";
if ($mysqli->query($sql) === TRUE) {
	$_SESSION['statusann']='success';
header('Location:add-announcement.php?status=success');
}
else
{
	  echo "Error: <br>" . $mysqli->error;
}
$mysqli->close();
?>