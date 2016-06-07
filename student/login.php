<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Home - TPO</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


</head>
<script type="text/javascript">
$(document).ready(function()
{
	var status="<?php if(isset($_GET['status']))
	{
		if($_GET['status']=='failed')
			echo "failed";
	}
    else echo "success";	
	?>";
	if(status=="failed")
	{
		$('#message').show();
		$('#message').html('<font color="yellow"><h4>Please login with valid credentials</h4></font>');
	}
	else
		$('#message').hide();
});
</script>
<body>

    

        <div class="container">
<div class="page-header">
    <font color="white"><h2 align="center">Training and Placement Cell, PEC Chandigarh: Student Application Panel</h2></font>
</div>
            <form class="form-signin" method="POST" action="authenticate.php" >
			    <div id="message" align="center"></div>
                <font color="white"><h2 class="form-signin-heading">Please sign in</h2></font>
                <label for="inputEmail" class="sr-only">Username</label>
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required>
				<br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <font color="white"><label for="prog">Programme</label></font>
		        <select name="prog" id="prog" class="form-control input-lg" required>
                <option value="BE">BE Final year</option>
                <option value="ME">ME Final year</option>
                <option value="BEINT">BE Third year</option>
                </select><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
<center>
<img src="../images/PEC-Logo.png">
</center>
        </div>

    

</body>

</html>