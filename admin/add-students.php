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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php include "../header.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                            <form action="sendmails.php" method="post" enctype="multipart/form-data"> 
                                <h3>
                                    <span class="label label-default">Upload Excel File (.xlsx)</span>
                                </h3>

                                <div class="form-group">
                                    <label for="file">File input</label>
                                    <input type="file" name="file" id="file" />
                                </div> 
                                
                                <div class="form-group">
                                   <input class="btn btn-primary" type="submit" name="submit" /></td> 
                                </div>
                            </form> 
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

</body>

</html>

<?php

$uploadedStatus = 0; 

if ( isset($_POST["submit"]) ) { 

    if ( isset($_FILES["file"])) { 
        //if there was an error uploading the file 
        if ($_FILES["file"]["error"] > 0) { 
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />"; 
        } else { 
            if (!file_exists($_FILES["file"]["name"])) { 
                unlink($_FILES["file"]["name"]); 
            } 
            $file_name = $_FILES["file"]["name"];
            if(move_uploaded_file($_FILES["file"]["tmp_name"], '..\sheets\\'.$file_name)){
                echo 'hey!';
            } 
            $uploadedStatus = 1; 
        }
    } else { 
        echo "No file selected <br />"; 
    } 
} 

?>