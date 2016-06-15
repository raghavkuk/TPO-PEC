<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

include '../db_connection.php';


/************************ YOUR DATABASE CONNECTION END HERE  ****************************/

$databasetable = "student_details";

include '../Classes/PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$sql="DELETE from student_details";
$result = $mysqli->query($sql);
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

$sheetcount= $objPHPExcel->getSheetCount();
echo $sheetcount."<br>";
for($j=0; $j<$sheetcount;$j++)
{

$allDataInSheet = $objPHPExcel->getSheet($j)->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

for($i = 2; $i <= $arrayCount; $i++) {
    
	$sid = trim( $allDataInSheet[$i]["B"] );
	$name = trim( $allDataInSheet[$i]["C"] );
	$dob = trim( $allDataInSheet[$i]["J"] );
	$gender = trim( $allDataInSheet[$i]["D"] );
	$contact_no = trim( $allDataInSheet[$i]["AE"] );
	$email = trim( $allDataInSheet[$i]["AF"] );
	$hometown= trim( $allDataInSheet[$i]["G"] );
	$state= trim( $allDataInSheet[$i]["H"] );
	$pin= trim( $allDataInSheet[$i]["I"] );
	$branch= trim( $allDataInSheet[$i]["K"] );
	$address = trim( $allDataInSheet[$i]["F"] );
	$aieee_rank = trim( $allDataInSheet[$i]["L"] );
	$category = trim( $allDataInSheet[$i]["E"] );
	$marks_10th = trim( $allDataInSheet[$i]["M"] );
	$board_10th = trim( $allDataInSheet[$i]["N"] );
	$year_10th = trim( $allDataInSheet[$i]["O"] );
	$school_10th = trim( $allDataInSheet[$i]["P"] );
	$marks_12th = trim( $allDataInSheet[$i]["Q"] );
	$board_12th = trim( $allDataInSheet[$i]["R"] );
	$year_12th = trim( $allDataInSheet[$i]["S"] );
	$school_12th = trim( $allDataInSheet[$i]["T"] );
	$sgpa_sem1 = trim( $allDataInSheet[$i]["U"] );
	$sgpa_sem2 = trim( $allDataInSheet[$i]["V"] );
	$sgpa_sem3 = trim( $allDataInSheet[$i]["W"] );
	$sgpa_sem4 = trim( $allDataInSheet[$i]["X"] );
	$sgpa_sem5 = trim( $allDataInSheet[$i]["Y"] );
	$sgpa_sem6 = trim( $allDataInSheet[$i]["Z"] );
	$cgpa = trim( $allDataInSheet[$i]["AA"] );
	$percentage= trim( $allDataInSheet[$i]["AB"] );
	$training = trim( $allDataInSheet[$i]["AC"] );
	$backlog = trim( $allDataInSheet[$i]["AD"] );
	$father_name = trim( $allDataInSheet[$i]["AG"] );
	$mother_name = trim( $allDataInSheet[$i]["AH"] );
	$parent_contact = trim( $allDataInSheet[$i]["AI"] );
    $branch= trim( $allDataInSheet[$i]["K"] );

	$query = "INSERT INTO student_details (sid, name, gender, category, address, hometown,state, pincode, dob,programme, branch, aieee_rank, 
		10th_marks, 10th_board, 10th_year, 10th_school, 12th_marks, 12th_board, 12th_year, 12th_school, 
		sgpa_sem1, sgpa_sem2, sgpa_sem3, sgpa_sem4, sgpa_sem5, sgpa_sem6, cgpa, percentage, training, backlogs, contact_no, email, father_name, 
		mother_name, parent_contact) VALUES ('".$sid."', '".$name."', '".$gender."', '".$category."', 
		'".$address."', '".$hometown."', '".$state."', '".$pin."', '".$dob."', '".$prog."', '".$branch."', '".$aieee_rank."', '".$marks_10th."', '".$board_10th."', 
		'".$year_10th."', '".$school_10th."', '".$marks_12th."', '".$board_12th."', '".$year_12th."', 
		'".$school_12th."', '".$sgpa_sem1."', '".$sgpa_sem2."', '".$sgpa_sem3."', '".$sgpa_sem4."', '".$sgpa_sem5."', '".$sgpa_sem6."', '".$cgpa."', 
		'".$percentage."', '".$training."', '".$backlog."', '".$contact_no."', '".$email."', '".$father_name."', '".$mother_name."', 
		'".$parent_contact."')";
echo $query."<br>";
	$result = $mysqli->query($query);

}
}


?>
