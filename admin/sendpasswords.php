<?php
session_start();
include '../db_connection.php';
include '../PHPMailer/PHPMailerAutoload.php';
$prog=$_POST['passprog'];
$query="SELECT * from student_login where programme='$prog'";
$result = $mysqli->query($query);
if($result->num_rows>0){
	while($row=$result->fetch_assoc())
	{
		$name=$row['student_name'];
		$msg="Hi $name, <br><br>Greetings from TPO-PEC. For using the Student Panel: <br> Your Username is: ".$row['username']."<br>Your Password is: ".$row['textpwd']."<br>You are advised to change the password after logging in successfully into the system.";
		$email=$row['email'];
		

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
	$mail->addAddress($email, "");
	//Set the subject line
	$mail->Subject = 'TPO PEC - Login Credentials';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->Body = $msg;
	//Replace the plain text body with one created manually
	$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors

	if (!$mail->send()) {
	    //echo "Mailer Error: " . $mail->ErrorInfo;
	    echo "<center><font face='Verdana' size='2' color=red><b>Couldn't send mail!";
	} else {
	    echo "<center><font face='Verdana' size='2' color=red><b>All set.". $email;
	} 

	}
    
	}
	header('Location:add-students.php?sent=success');
?>