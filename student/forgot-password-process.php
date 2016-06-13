<?php

session_start();

include "../db_connection.php"; 

$email = $_POST['email'];

$site_url="http://localhost/tpo-pec/student/";
?>

<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Forgot Password - TPO</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

	<div class="container">
            <div class="page-header">
                <font color="white"><h2 align="center">Training and Placement Cell, PEC Chandigarh</h2></font>
            </div>
            <div class="col-12" id="final-msg">

            

<?php

$status = "OK";
$msg="";
$student_login_table = "student_login";
$student_details_table = "student_details";
$activation_keys_table = "activation_keys";

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

	$msg="Your email address is not correct<BR>"; 
	$status= "NOTOK";
}

echo "<br><br>";
if($status=="OK"){

	$email_exist_query = "SELECT email,sid,name FROM $student_details_table WHERE email = '$email'";
	$email_result = $mysqli->query($email_exist_query);
	$email_row = $email_result->fetch_assoc();
	$email_rows = $email_result->num_rows;

	$db_email = $email_row['email'];// email is stored to a variable
	$db_sid = $email_row['sid'];
	$db_name = $email_row['name'];

	if ($email_rows == 0) {  
		echo "<center><font face='Verdana' size='2' color=red><b>No Password</b><br> Sorry Your address is not there in our database . 
		<BR><BR><input type='button' value='Retry' onClick='history.go(-1)'> . 
		<a href='login.php'> Sign UP </a> </center>"; 
		exit;
	}

	/// check if activation is pending /////
	//$time = time() - 86400; // Time in last 24 hours
	$key_query = "SELECT sid FROM $activation_keys_table WHERE sid = $db_sid and astatus='pending'";
	$key_result = $mysqli->query($key_query);
	$key_rows = $key_result->num_rows;
	//echo " No of records = ".$no; 
	if($key_rows == 1){
		echo "<center><font face='Verdana' size='2' color=red><b>Your password activation Key is already posted to your email address, please check your Email"; 
		exit;
	}

	/////////////// Let us send the email with key /////////////
	/// function to generate random number ///////////////
	function random_generator($digits){
		srand ((double) microtime() * 10000000);
		//Array of alphabets
		$input = array ("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q",
		"R","S","T","U","V","W","X","Y","Z");

		$random_generator="";// Initialize the string to store random numbers
		
		for($i=1;$i<$digits+1;$i++){ // Loop the number of times of required digits

			if(rand(1,2) == 1){// to decide the digit should be numeric or alphabet
				// Add one random alphabet 
				$rand_index = array_rand($input);
				$random_generator .=$input[$rand_index]; // One char is added

			}else{

				// Add one numeric digit between 1 and 10
				$random_generator .=rand(1,10); // one number is added
			} // end of if else

		} // end of for loop 

		return $random_generator;
	} // end of function


	$key = random_generator(10);
	$key = md5($key);
	$tm = time();

	$key_insert_query = "INSERT INTO $activation_keys_table(sid, akey, time, astatus) VALUES('$db_sid','$key','$tm','pending')";
	$key_insert_result = $mysqli->query($key_insert_query);

	$site_url=$site_url."reset-password.php?ak=$key&userid=$db_sid";

	require '../PHPMailer/PHPMailerAutoload.php';

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	//Create a new PHPMailer instance
	$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
	$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;
	//Ask for HTML-friendly debug output
	//$mail->Debugoutput = 'html';
	//Set the hostname of the mail server
	$mail->Host = 'smtp.gmail.com';
	// use
	// $mail->Host = gethostbyname('smtp.gmail.com');
	// if your network does not support SMTP over IPv6
	//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
	$mail->Port = 587;
	//Set the encryption system to use - ssl (deprecated) or tls
	$mail->SMTPSecure = 'tls';
	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;
	//Username to use for SMTP authentication - use full email address for gmail
	$mail->Username = "tpo.pecuniv@gmail.com";
	//Password to use for SMTP authentication
	$mail->Password = "tpodev01";
	//Set who the message is to be sent from
	$mail->setFrom('tpo.pecuniv@gmail.com', 'TPO PEC');
	//Set an alternative reply-to address
	//$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress($db_email, $db_name);
	//Set the subject line
	$mail->Subject = 'TPO PEC - Reset your password';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->Body = $site_url;
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors

	if (!$mail->send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
	    echo "<center><font face='Verdana' size='2' color=red><b>Couldn't send mail!";
	} else {
	    echo "<center><font face='Verdana' size='2' color=red><b>A link to reset your password has been sent to the email address you provided.";
	} 

}

?>


		</div>
            <center>
            	<img src="../images/PEC-Logo.png">
            </center>
        </div>

    

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>
