<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

include '../db_connection.php';


/************************ YOUR DATABASE CONNECTION END HERE  ****************************/

$databasetable = "student_details";

include '../Classes/PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$branchbe=$_POST['branchbe'];
$branchme=$_POST['branchme'];
$branchbeint=$_POST['branchbeint'];
$branch="";
if($branchbe!="NA")
{
	$branch=$branchbe;
    $prog="BE";
}
else if($branchme!="NA")
{
	$branch=$branchme;
    $prog="ME";
}
else
{
	$branch=$branchbeint;
    $prog="BEINT";
}
$inputFileName = $_FILES["file"]["name"];
try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

$sql="DELETE from student_details";
$result = $mysqli->query($sql);
for($i = 2; $i <= $arrayCount; $i++) {

	$sid = trim( $allDataInSheet[$i]["B"] );
	$name = trim( $allDataInSheet[$i]["C"] );
	$dob = trim( $allDataInSheet[$i]["D"] );
	$gender = trim( $allDataInSheet[$i]["E"] );
	$contact_no = trim( $allDataInSheet[$i]["F"] );
	$email = trim( $allDataInSheet[$i]["G"] );
	$address = trim( $allDataInSheet[$i]["I"] );
	$aieee_rank = trim( $allDataInSheet[$i]["J"] );
	$category = trim( $allDataInSheet[$i]["K"] );
	$marks_10th = trim( $allDataInSheet[$i]["L"] );
	$board_10th = trim( $allDataInSheet[$i]["M"] );
	$year_10th = trim( $allDataInSheet[$i]["N"] );
	$school_10th = trim( $allDataInSheet[$i]["O"] );
	$marks_12th = trim( $allDataInSheet[$i]["P"] );
	$board_12th = trim( $allDataInSheet[$i]["Q"] );
	$year_12th = trim( $allDataInSheet[$i]["R"] );
	$school_12th = trim( $allDataInSheet[$i]["S"] );
	$sgpa_sem1 = trim( $allDataInSheet[$i]["T"] );
	$sgpa_sem2 = trim( $allDataInSheet[$i]["U"] );
	$sgpa_sem3 = trim( $allDataInSheet[$i]["V"] );
	$sgpa_sem4 = trim( $allDataInSheet[$i]["W"] );
	$cgpa = trim( $allDataInSheet[$i]["X"] );
	$training = trim( $allDataInSheet[$i]["Y"] );
	$backlog = trim( $allDataInSheet[$i]["Z"] );
	$father_name = trim( $allDataInSheet[$i]["AA"] );
	$mother_name = trim( $allDataInSheet[$i]["AB"] );
	$father_contact = trim( $allDataInSheet[$i]["AC"] );


	$query = "INSERT INTO student_details (sid, name, gender, category, address, dob,programme, branch, aieee_rank, 
		10th_marks, 10th_board, 10th_year, 10th_school, 12th_marks, 12th_board, 12th_year, 12th_school, 
		sgpa_sem1, sgpa_sem2, sgpa_sem3, sgpa_sem4, cgpa, training, backlogs, contact_no, email, father_name, 
		mother_name, father_contact) VALUES ('".$sid."', '".$name."', '".$gender."', '".$category."', 
		'".$address."', '".$dob."', '".$prog."', '".$branch."', '".$aieee_rank."', '".$marks_10th."', '".$board_10th."', 
		'".$year_10th."', '".$school_10th."', '".$marks_12th."', '".$board_12th."', '".$year_12th."', 
		'".$school_12th."', '".$sgpa_sem1."', '".$sgpa_sem2."', '".$sgpa_sem3."', '".$sgpa_sem4."', '".$cgpa."', 
		'".$training."', '".$backlog."', '".$contact_no."', '".$email."', '".$father_name."', '".$mother_name."', 
		'".$father_contact."')";
echo $query."<br>";
	$result = $mysqli->query($query);

}


?>
