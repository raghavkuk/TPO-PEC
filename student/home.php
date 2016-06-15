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

$cgpa = $details_row['cgpa'];

$_SESSION['name']=$student_name;
$_SESSION['cgpa']=$cgpa;
$programme_query = "SELECT programme, branch FROM ".$student_login_table." WHERE sid = ".$sid;
$programme_result = $mysqli->query($programme_query);
$programme_row = $programme_result->fetch_assoc();
$programme = $programme_row['programme'];
$branch = $programme_row['branch'];
$_SESSION['branch']=$branch;
$placementtable="";
$jtype="";
$loginprog=$_SESSION['loginprog'];
if($loginprog=="BE")
{
	$placementtable="placementdetails_be";
	$jtype="Placement";
}
if($loginprog=="BEINT")
{
	$placementtable="placementdetails_beint";
	$jtype="Internship";
}
if($loginprog=="ME")
{
	$placementtable="placementdetails_me";
	$jtype="Placement";
}
$_SESSION['prog']=$programme;
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<script type="text/javascript">
$(document).ready(function()
{
	var status="<?php
	if(isset($_GET['status']))
	{
		if($_GET['status']=="success")
			echo "success";
		else echo "";
	}
	else echo "";
	?>";
	if(status=="success")
	{
		$('#successmessage').html('');
		$('#successmessage').html("You successfully applied for the company!<br>");
		$('#successmessage').append("<strong>Watch out for more..</strong>");
	}
	$('#cvoptions').change(function()
	{
		if($('#cvoptions').val()!="No CV")
			document.getElementById('fileToUpload').required=false;
	});
		
});
</script>
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
				<div class="alert alert-info alert-dismissable">
				<div id="successmessage">
	<strong>Following are the companies available for you</strong>
	</div>
	</div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <div class="panel-group" id="companies-accordion">

                            <?php 
                                $pkg=0;
								$_SESSION['applied']="";
								$sql="SELECT distinct jaf_id from applications where sid='$sid' AND student_programme='$programme'";
								$result=$mysqli->query($sql);
								$app="";
								$cnt=$result->num_rows;
								if($cnt>0)
								{
								while($row=$result->fetch_assoc())
								{
									if($cnt==1)
										$app=$app."'".$row['jaf_id']."'";
									else
										$app=$app."'".$row['jaf_id']."',";
									$cnt--;
								}
								}
                                $sql="select * from $placementtable where sid=$sid";
								//echo $sql;
								$eligible="";
								$jafq="";
								
								if($app!="")
								{	
								   $jafq=" and jaf_id NOT IN ($app)";
								   $_SESSION['applied']=$app;
								}
								$result=$mysqli->query($sql);
								while($row=$result->fetch_assoc())
								{
									if($row['status']!='PLACED')
									{
										$pkg=$row['package1'];
										$pkg=2+$pkg;
									}
									$eligible=$row['eligible_further'];
									
								}
								if($eligible=="YES")
								{
								$jaf_query = "SELECT * FROM ".$jaf_table." WHERE reviewed>0 and jobtype='".$jtype."' and cgpa <= ".$cgpa." and ctc>=$pkg and deadline >= curdate() and programme like '%BE%' and (branches_be like '%$branch%' or branches_me like '%$branch%')".$jafq." order by deadline";
                                //echo $jaf_query;
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
                                    $jobtype=$jaf['jobtype'];
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
                                                            <label for="fileToUpload" class="control-label col-sm-2">Upload Resume/CV:</label>
                                                            <div class="col-sm-10"> 
                                                                <input type="file" name="fileToUpload" id="fileToUpload" required="true">
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
                                                            <div class="col-sm-4">
                                                                <select class="form-control" name="cvoptions" id="cvoptions" class="cvoptions">
																<option value="No CV">No CV</option>
                                                                <?php 

                                                                    $cv_query = "SELECT * FROM ".$cv_table." WHERE sid = ".$sid ;
                                                                    $cv_result = $mysqli->query($cv_query);

                                                                    while ($cv = $cv_result->fetch_assoc()) {
                                                                        $filename = $cv['filename']; ?>

                                                                        <option value="<?php echo $filename;  ?>"><?php echo $filename; ?></option>

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
														<input type="hidden" name="jobtype" value="<?php echo $jobtype; ?>" />
                                                        <button type="submit" class="btn btn-default" name="submit">Apply</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php $i++; }
								}
								
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
    

</body>

</html>

<?php



?>
