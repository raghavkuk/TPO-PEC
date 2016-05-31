<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TPO Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <?php include "../header-student.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Send Notification
                        </h1>
                            
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <label for="notification-msg">Message:</label>
                        <input type="text" class="form-control" id="notification-msg">
                        <button type="button" class="btn btn-primary" onclick="send()">Send</button>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script>
    function send(){
        var inp_txt = document.getElementById('notification-msg').value;
        window.location = "http://localhost/tpo/mapp/send-notification.php?message="+inp_txt+"&id=eGUyHBFIk5k:APA91bHy6M3ZW8tynupyGkx8y7dKx0L80G2jywsJ93TBNzshfxG0rfUyKkRCyvPxySSrYHgnWAW5gXZzO4M8DWXTBxrJiQ1Svv3qAMxPugGXHSa4dfjh8EtfRdDdZX4kfW4ev35-HCLd";
    }
    
    </script>

</body>

</html>

