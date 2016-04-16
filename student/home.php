<?php

include '../db_connection.php';

session_start();

$sid = $_SESSION["sid"];

$student_details_table = "student_details";
$companies_table = "companies";

$detail_query = "SELECT name, branch, cgpa FROM ".$student_details_table." WHERE sid = '".$sid."'";

$result = $mysqli->query($detail_query);
$details_row = $result->fetch_row();

$student_name = $details_row[0];
$branch = $details_row[1];
$cgpa = $details_row[2];

?>

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
                            New Companies
                        </h1>
                            
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel-group" id="companies-accordion">

                            <?php 

                                $companies_query = "SELECT company_name, company_about FROM ".$companies_table;
                                $companies_result = $mysqli->query($companies_query);  

                                while($company  = $mysqli->fetch_assoc($companies_result)) {
                                    $company_name = $company['company_name'];
                                    $company_about = $company['company_about'];  
                                    ?>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#companies-accordion" href="#">
                                                <?php echo $company_name; ?></a>
                                            </h4>
                                        </div>
                                        <div class="panel-collapse collapse in">
                                            <div class="panel-body"><?php echo $company_about; ?></div>
                                        </div>
                                    </div>

                                <?php }

                            ?>
                        </div>

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



?>
