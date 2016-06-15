<?php 
session_start();
include '../functions.php'; 
?>
<html>
<head>
<title>Settings</title>
<<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.table2excel.js"></script>
</head>

<body>
    <div id="wrapper">

        <?php include '../header-student.php'; ?>
		

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Settings
                        </h1>
            		</div>
        		</div>

        		<form class="form-signin" method="POST" action="settings.php" >
                	<font color="black"><h2 class="form-signin-heading">Change Password</h2></font>
                	<label for="existing-password" class="sr-only">Existing password</label>
                	<input type="password" id="existing-password" name="existing-password" class="form-control" placeholder="Existing Password" required="" autofocus="">
                	<label for="new-password" class="sr-only">New Password</label>
                	<input type="password" id="new-password" name="new-password" class="form-control" placeholder="New Password" required="">
                	<label for="new-password-confirm" class="sr-only">New Password Confirm</label>
                	<input type="password" id="new-password-confirm" name="new-password-confirm" class="form-control" placeholder="Confirm New Password" required=""><br>
                	<button class="btn btn-lg btn-primary btn-block" type="submit" id="submit" name="submit">Change Password</button>
            	</form>

            	<div>
            		<h4>
            			<?php 

            			include '../db_connection.php';

						if(isset($_POST['submit'])){

							$old_password = md5($_POST['existing-password']);
							$student_login_table = "student_login";
							$sid = $_SESSION['sid'];

							$new_password = md5($_POST['new-password']);
							$confirm_password = md5($_POST['new-password-confirm']);


							$password_check_query = "SELECT sid, password FROM $student_login_table WHERE password='$old_password' AND sid=$sid";
							$password_check_result = $mysqli->query($password_check_query);

							if($password_check_result->num_rows == 1){

								if($new_password != $confirm_password){
									echo "New passwords do not match!";
									exit;
								}

								$password_update_query = "UPDATE $student_login_table SET password='$new_password' WHERE sid=$sid AND password='$old_password'";
								$mysqli->query($password_update_query);
								$update_result_rows = $mysqli->affected_rows;

								if($update_result_rows == 1){
									echo "Password updated successfully!";
								}else{
									echo "Couldn't update your password. Contact admin.";
								}

							}else{
								echo "Couldn't verify your account.";
							}

						}

						


						?>
            		</h4>
            	</div>

        	</div>

    	</div>
    </div>

	
	</body>
</html>



