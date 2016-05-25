<?php
include '../db_connection.php';
$sid = $_POST['sid'];
$cv_table = "cvs";
$cv_url = "";
$cv_id=-1;
$filename = basename( $_FILES["fileToUpload"]["name"]);
if($_FILES["fileToUpload"]["error"] == 4) {
if($_POST['cvoptions']!='No CV')
	$query = "Select cv_id from cvs where filename='".$_POST['cvoptions']."'";   
    $result = $mysqli->query($query);
	while($row=$result->fetch_assoc())
	{
		$cv_id=$row['cv_id'];
	}
}
else{
$target_dir = "../cvs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($fileType != "pdf") {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	$cv_url = $_SERVER['HTTP_HOST'].'/tpo-pec/cvs/'.basename( $_FILES["fileToUpload"]["name"]);
	$cv_save_query = "INSERT INTO ".$cv_table." (sid, cv_url, filename) VALUES ('".$sid."', '".$cv_url."', '".$filename."')";   
    $cv_save_result = $mysqli->query($cv_save_query);
    $cv_id = $mysqli->insert_id;
    echo $cv_id;

}
}

$applications_table = "applications";

$jaf_id = $_POST['jaf_id'];
$company_id = $_POST['company_id'];
$job_designation = $_POST['job_designation'];
$company_name = $_POST['company_name'];

$student_name = $_POST['student_name'];
$student_programme = $_POST['student_programme'];
$student_branch = $_POST['student_branch'];

$date_of_application = date('Y-m-d H:i:s');



$application_query = "INSERT INTO ".$applications_table." (company_id, jaf_id, job_designation, company_name, sid, 
                        student_name, student_programme, student_branch, cv_id, date_of_application) VALUES ('".$company_id."', 
                        '".$jaf_id."', '".$job_designation."', '".$company_name."', '".$sid."', '".$student_name."', 
                        '".$student_programme."', '".$student_branch."', '".$cv_id."', '".$date_of_application."')";

$application_result = $mysqli->query($application_query);
?>