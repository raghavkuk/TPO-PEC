<?php

session_start();
include '../db_connection.php';
$jafid=$_GET['jafid'];
$designation = $_POST["designation"];
$jobdesc = $_POST["jobdesc"];
$ctc = $_POST["ctc"];
$gross = $_POST["gross"];
$perks = $_POST["perks"];
$bond = $_POST["bond"];
$cgpa = $_POST["cgpa"];
$written = $_POST["written"];
$interview = $_POST["interview"];
$other = $_POST["other"];
$selproc = "";
$dateofvisit=$_POST['dateofvisit'];
$deadline = $_POST['deadline'];
$success = 0;
if(isset($_POST["pptalk"]) && $_POST["pptalk"] == 'Yes')
	$selproc=$selproc."Pre-Placement Talk";

if(isset($_POST["shortlistfromresume"]) && $_POST["shortlistfromresume"] == 'Yes')
	$selproc=$selproc." Shortlisting From Resumes";

if(isset($_POST["gd"]) && $_POST["gd"] == 'Yes')
	$selproc=$selproc." Group Discussion";
$sql="UPDATE jaf_details set job_designation='$designation', job_description='$jobdesc', ctc='$ctc', gross='$gross', perks='$perks', bond='$bond', cgpa='$cgpa', written='$written', interview='$interview', selection_proc='$selproc', other='$other',dateofvisit='$dateofvisit', deadline='$deadline', reviewed=reviewed+1 where JAF_id=$jafid"; 
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