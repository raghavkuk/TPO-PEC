<!DOCTYPE html>
<html lang="en">

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
            <form class="form-signin" method="POST" action="forgot-password-process.php" >
                <font color="white"><h2 class="form-signin-heading">Forgot password?</h2></font>
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required="" autofocus="">
				<br>
                <label for="inputEmail" class="sr-only">E-mail</label>
                <input type="text" id="inputEmail" name="email" class="form-control" placeholder="e-mail" required=""><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
                <p><a href="login.php">Sign-in?</a></p>
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