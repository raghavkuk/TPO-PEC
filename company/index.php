<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>TPO PEC: Company Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">
$(document).ready(function()
{
	var status="<?php if(isset($_GET['status']))
	{
		if($_GET['status']=='failed')
			echo "failed";
		else if($_GET['status']=='frozen')
			echo "frozen";
	}
    else echo "success";	
	?>";
	if(status=="failed")
	{
		$('#message').show();
		$('#message').html('<font color="yellow"><h4>Please login with valid credentials</h4></font>');
	}
	else if(status=="frozen")
	{
		$('#message').show();
		$('#message').html('<font color="yellow"><h4>Your account stands blocked or frozen. Please contact TPO.</h4></font>');
	}
	else
		$('#message').hide();
});
</script>
<div class="container">

<div class="page-header">
    <font color="white"><h2 align="center">Training and Placement Cell, PEC Chandigarh: Company Home</h2></font>
</div>

<!-- Simple Login - START -->
<form class="form-signin" action="clogin.php" method="post">
<div id="message" align="center"></div>
<font color="white"><h2 class="form-signin-heading">Please sign in</h2></font>
    <div class="form-group">
        <input type="text" class="form-control" id="cname" name="cname" placeholder="Company Username" autofocus="">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Password" pattern="^[a-zA-Z0-9_- ]*$">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-lg btn-block">Sign In</button>
        <!--span><a href="#">Forgot password?</a></span-->
        <!--span class="pull-right"><a href="#">New Registration</a></span-->
    </div>
</form>
<!-- Simple Login - END -->
<center>
<img src="../images/PEC-Logo.png">
</center>
</div>

</body>
</html>