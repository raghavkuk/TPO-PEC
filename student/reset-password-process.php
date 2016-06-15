<?Php

include "../db_connection.php";

$ak = $_POST['ak'];
$sid = $_POST['sid'];
$todo=$_POST['todo'];
$password = $_POST['password'];
$password2 = $_POST['passwordConfirm'];

?>
<!doctype html public "-//w3c//dtd html 3.2//en">

<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password - TPO</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
<?Php

$tm=time()-86400;


$tm=time()-86400; // Durationg within which the key is valid is 86400 sec. 
$activation_keys_table = "activation_keys";

$check_status_query = "SELECT sid FROM $activation_keys_table WHERE akey = '$ak' and sid = $sid and astatus='pending'";
$check_status_result = $mysqli->query($check_status_query);

$student_login_table = "student_login";

$num_keys = $check_status_result->num_rows; 

if($num_keys != 1){
echo "<center><font face='Verdana' size='2' color=red><b>Invalid activation</b></font> "; 
exit;
}

////////////////////// Show the change password form //////////////////


if(isset($todo) and $todo=="new-password"){

	//Setting flags for checking
	$status = "OK";
	$msg="";

			


	if ( strlen($password) < 3 or strlen($password) > 8 ){
		$msg=$msg."Password must be more than 3 char legth and maximum 8 char lenght<BR>";
		$status= "NOTOK";
	}					

	if ( $password <> $password2 ){
		$msg=$msg."Both passwords are not matching<BR>";
		$status= "NOTOK";
	}					



	if($status<>"OK"){ 
		echo "<font face='Verdana' size='2' color=red>$msg</font><br><center><input type='button' value='Retry' onClick='history.go(-1)'></center>";
	}else{ // if all validations are passed.
		$password=md5($password); // Encrypt the password before storing

		// Update the new password now //
		$password_reset_query = "UPDATE $student_login_table set password='$password' where username='$sid'";
		$password_reset_result = $mysqli->query($password_reset_query);
		$reset_result_rows = $mysqli->affected_rows;

		if($reset_result_rows == 1){

			$tm=time();
			// Update the key so it can't be used again. 
			$key_status_query = "DELETE FROM $activation_keys_table where akey='$ak' and sid='$sid'";
			$mysqli->query($key_status_query);

			echo "<font face='Verdana' size='2' color=red><center>Thanks <br> Your new password is stored successfully. You may now login using the new credentials. <a href='login.php'>Login</a></font></center>";
		}else{
				echo "<font face='Verdana' size='2' color=red><center>Sorry <br> Failed to store new password. Contact Site Admin</font></center>";
		} 
	} 
}

$mysqli->close();
?>

</body>

</html>
