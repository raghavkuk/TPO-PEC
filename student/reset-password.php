<?Php

include "../db_connection.php"; // database connection details stored here
//////////////////////////////
$ak = $_GET['ak'];
$sid = $_GET['userid'];

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

<body >
<?Php


$tm=time()-86400; // Durationg within which the key is valid is 86400 sec. 
$activation_keys_table = "activation_keys";

$check_status_query = "SELECT sid FROM $activation_keys_table WHERE akey = '$ak' and sid = $sid and astatus='pending'";
$check_status_result = $mysqli->query($check_status_query);

$num_keys = $check_status_result->num_rows; 

if($num_keys != 1){
echo "<center><font face='Verdana' size='2' color=red><b>Wrong activation </b></font> "; 
exit;
}

////////////////////// Show the change password form //////////////////
?>

		<div class="container">
            <div class="page-header">
                <font color="white"><h2 align="center">Training and Placement Cell, PEC Chandigarh</h2></font>
            </div>
            <form class="form-signin" action='reset-password-process.php' method=post><input type=hidden name=todo value=new-password>
				<?php echo "<input type=hidden name=ak value=$ak>" ?>
				<?php echo "<input type=hidden name=sid value=$sid>" ?>
				<font color="white"><h2 class="form-signin-heading">Reset Your Password</h2></font>
	                <label class="sr-only">New Password: </label>
					<input type ='password' name='password' class="form-control" placeholder="New Password" required="" autofocus="">
					
					<label class="sr-only">Confirm: </label>
					<input type ='password' name='passwordConfirm' class="form-control" placeholder="Confirm Password" required="">
					<button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>
			</form>
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
