<?php
/************************ YOUR DATABASE CONNECTION START HERE   ****************************/

//include '../db_connection.php';


/************************ YOUR DATABASE CONNECTION END HERE  ****************************/
ini_set('sendmail_from','kashish3032@gmail.com');
$databasetable = "student_details";

include '../Classes/PHPExcel/IOFactory.php';

// This is the file path to be uploaded.
$inputFileName = $_FILES["file"]["name"]; 
echo $inputFileName;

try {
	$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
} catch(Exception $e) {
	die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}


$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
$arrayCount = count($allDataInSheet);  // Here get total count of row in that Excel sheet

$to='kashish3032@gmail.com';
$subject='Placements';
$txt="Hi there";
$headers='From: kashish3032@gmail.com'.'\r\n'.'CC:';
for($i = 3; $i <= $arrayCount; $i++) {
	$company = trim( $allDataInSheet[$i]["B"] );
	$name = trim( $allDataInSheet[$i]["C"] );
	$mail = trim( $allDataInSheet[$i]["D"] );
	echo $company." ".$name." ".$mail."<br>";
	if($i==$arrayCount)
	$headers=$headers.$mail;
    else
		$headers=$headers.$mail.",";
}
echo $headers;
mail($to,$subject,$txt,$headers);
?>
