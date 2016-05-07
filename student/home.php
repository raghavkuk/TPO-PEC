<?php

include '../db_connection.php';

session_start();

$sid = $_SESSION["sid"];

$student_details_table = "student_details";
$student_login_table = 'student_login';
$companies_table = "companies";
$jaf_table = "jaf_details";
$cv_table = "cvs";

$detail_query = "SELECT name, branch, cgpa FROM ".$student_details_table." WHERE sid = ".$sid;
$result = $mysqli->query($detail_query);
$details_row = $result->fetch_assoc();

$student_name = $details_row['name'];
$branch = $details_row['branch'];
$cgpa = $details_row['cgpa'];

$programme_query = "SELECT programme FROM ".$student_login_table." WHERE sid = ".$sid;
$programme_result = $mysqli->query($programme_query);
$programme_row = $programme_result->fetch_assoc();
$programme = $programme_row['programme'];

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

                                $jaf_query = "SELECT * FROM ".$jaf_table." WHERE cgpa <= ".$cgpa;
                                $jaf_result = $mysqli->query($jaf_query);

                                $i = 0;

                                while($jaf = $jaf_result->fetch_assoc()) {

                                    $jaf_id = $jaf['JAF_id'];
                                    $company_id = $jaf['company_id'];
                                    $job_designation = $jaf['job_designation'];
                                    $job_description = $jaf['job_description'];
                                    $ctc = $jaf['ctc'];
                                    $gross = $jaf['gross'];
                                    $perks = $jaf['perks'];
                                    $bond = $jaf['bond'];
                                    $min_cgpa = $jaf['cgpa'];
                                    $interview = $jaf['interview'];
                                    $selection_process = $jaf['selection_proc'];

                                    $company_query = "SELECT company_name, company_about FROM ".$companies_table." WHERE company_id = ".$company_id;
                                    $company_result = $mysqli->query($company_query);
                                    $company = $company_result->fetch_assoc(); 
                                    $company_name = $company['company_name'];
                                    $company_about = $company['company_about'];  
                                    ?>

                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#companies-accordion" href="#collapse<?php echo $i; ?>" >
                                                    <?php echo $company_name.' : '.$job_designation; ?></a>
                                                </h4>
                                            </div>
                                            <div class="panel-collapse collapse" id="<?php echo 'collapse'.$i; ?>" >
                                                <div class="panel-body">
                                                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="job-apply.php">
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2" >About Company:</label>
                                                            <div class="col-sm-10">
                                                                <p class="form-control-static" ><?php echo $company_about; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Designation:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static" name="job_designation"><?php echo $job_designation; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Job Description:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $job_description; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">CTC:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $ctc; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Gross:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $gross; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Perks:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $perks; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Bond:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $bond; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Minimum CGPA:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $min_cgpa; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Interview:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $interview; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Selection Process:</label>
                                                            <div class="col-sm-10"> 
                                                                <p class="form-control-static"><?php echo $selection_process; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2">Upload Resume/CV:</label>
                                                            <div class="col-sm-10"> 
                                                                <input type="file" name="fileToUpload" id="fileToUpload">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"></label>
                                                            <div class="col-sm-10">
                                                                <p><strong>or</strong></p>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-sm-2"></label>
                                                            <div class="col-sm-10">
                                                                <select class="form-control">
                                                                <?php 

                                                                    $cv_query = "SELECT * FROM ".$cv_table." WHERE sid = ".$sid ;
                                                                    $cv_result = $mysqli->query($cv_query);

                                                                    while ($cv = $cv_result->fetch_assoc()) {
                                                                        $filename = $cv['filename']; ?>

                                                                        <option><?php echo $filename; ?></option>

                                                                    <?php }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="jaf_id" value="<?php echo $jaf_id; ?>" />
                                                        <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" />
                                                        <input type="hidden" name="job_designation" value="<?php echo $job_designation; ?>" />
                                                        <input type="hidden" name="company_name" value="<?php echo $company_name; ?>" />
                                                        <input type="hidden" name="student_name" value="<?php echo $student_name; ?>" />
                                                        <input type="hidden" name="sid" value="<?php echo $sid; ?>" />
                                                        <input type="hidden" name="student_programme" value="<?php echo $programme; ?>" />
                                                        <input type="hidden" name="student_branch" value="<?php echo $branch; ?>" />
                                                        <button type="submit" class="btn btn-default" name="submit">Apply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php $i++; }

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
