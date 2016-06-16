<?php

session_start();
include '../db_connection.php';
$success = 0;
$jafid=$_GET['jafid'];
$type=$_POST["type"];
$designation = $_POST["designation"];
$jobdesc = $_POST["jobdesc"];
$ctc = $_POST["ctc"];
$gross = $_POST["gross"];
$perks = $_POST["perks"];
$bond = $_POST["bond"];
$cgpa = $_POST["cgpa"];
$prog=$_POST['prog'];
$written = $_POST["written"];
$interview = $_POST["interview"];
$other = $_POST["other"];
$selproc = "";
$deadline = $_POST['deadline'];
$dateofvisit=$_POST['dateofvisit'];
$success = 0;
$branches=array();
$c = 0;
$trades="";
$branchesme=array();
$d = 0;
$tradesme="";
if(isset($_POST["aero"]) && $_POST["aero"] == 'Aerospace Engineering')
{	$branches[$c]="Aerospace Engineering";
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
if(isset($_POST["meind"]) && $_POST["meind"] == 'Industrial Materials and Metallurgy')
{$branchesme[$c]="Industrial Materials and Metallurgy";
$c++;
}
if(isset($_POST["mecivilwr"]) && $_POST["mecivilwr"] == 'Civil Engineering (Irrigation and Hydrauics)'){
	$branchesme[$c]="Civil Engineering (Irrigation and Hydrauics)";
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
if(isset($_POST["mecivilhigh"]) && $_POST["mecivilhigh"] == 'Civil Engineering (Highways)'){
	$branchesme[$c]="Civil Engineering (Highways)";
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
if(isset($_POST["memech"]) && $_POST["memech"] == 'Mechanical Engineering'){
	$branchesme[$c]="Mechanical Engineering";
    $c++;
	}
if(isset($_POST["meis"]) && $_POST["meis"] == 'Computer Science and Engineering (Information Security)'){
	$branchesme[$c]="Computer Science and Engineering (Information Security)";
    $c++;
	}
if(isset($_POST["meece"]) && $_POST["meece"] == 'Electronics Engineering'){
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
	$tradesme="NA";
if($trades=="")
	$trades="NA";
$sp=array();
$c=0;
if(isset($_POST["pptalk"]) && $_POST["pptalk"] == 'Pre-Placement Talk')
$sp[$c++]="Pre-Placement Talk";	

if(isset($_POST["shortlistfromresume"]) && $_POST["shortlistfromresume"] == 'Shortlist from Resumes')
	$sp[$c++]="Shortlist from Resumes";
if(isset($_POST["gd"]) && $_POST["gd"] == 'Group Discussion')
	$sp[$c++]="Group Discussion";
$d=$c-1;
if($c>0)
{
	$i=0;
	while($i!=$d)
	{
		$selproc=$selproc.$sp[$i].",";
		$i++;
	}
	$selproc=$selproc.$sp[$i];
}
$sql="UPDATE jaf_details set jobtype='$type', job_designation='$designation', job_description='$jobdesc', ctc='$ctc', gross='$gross', perks='$perks', bond='$bond', cgpa='$cgpa', programme='$prog', branches_be='$trades', branches_me='$tradesme', written='$written', interview='$interview', selection_proc='$selproc', other='$other',dateofvisit='$dateofvisit', deadline='$deadline' where JAF_id=$jafid"; 
if ($mysqli->query($sql) === TRUE) {
	echo "New record created successfully";
	$success=1;
	$mysqli->close();
	header('Location: newcompany.php?status=success');
	

}
else
{
	 echo "Error: " . $sql . "<br>" . $mysqli->error;
	 $mysqli->close();
}

?>