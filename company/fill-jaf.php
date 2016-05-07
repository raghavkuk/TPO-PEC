<?php

session_start();
$_SESSION['status'] = "failure";
include '../functions.php'; 

?>

<html>
<head>
<title><?php echo $_SESSION['cname']; ?></title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">

function preview() {
	//var title="<h3 align='center'>Preview JAF Before Submission</h3>"
	var designation="<font size='3'><strong>Job Designation: </strong></font><font size='4'>"+$('input[name="designation"]').val()+"</font><br>";
	var desc="<font size='3'><strong>Job Description: </strong></font><font size='4'>"+$('#jobdesc').val()+"</font><br>";
	var ctc="<font size='3'><strong>Cost to Company: </strong></font><font size='4'>"+$('input[name="ctc"]').val()+"</font><br>";
	var gross="<font size='3'><strong>Gross: </strong></font><font size='4'>"+$('input[name="gross"]').val()+"</font><br>";
	var perks="<font size='3'><strong>Perks: </strong></font><font size='4'>"+$('input[name="perks"]').val()+"</font><br>";
	var bond="<font size='3'><strong>Bond: </strong></font><font size='4'>"+$('input[name="bond"]').val()+"</font><br>";
	var cgpa="<font size='3'><strong>CGPA Cut-Off: </strong></font><font size='4'>"+$('input[name="cgpa"]').val()+"</font><br>";
	var written="<font size='3'><strong>Written: </strong></font><font size='4'>"+$('#written').val()+"</font><br>";
	var interview="<font size='3'><strong>Interview: </strong></font><font size='4'>"+$('#interview').val()+"</font><br>";
	var other="<font size='3'><strong>Other: </strong></font><font size='4'>"+$('input[name="other"]').val()+"</font><br>";
	var deadline="<font size='3'><strong>Application Deadline: </strong></font><font size='4'>"+$('input[name="deadline"]').val()+"</font><br>";
	var dateofvisit="<font size='3'><strong>Date of Visit: </strong></font><font size='4'>"+$('input[name="dateofvisit"]').val()+"</font><br>";
	var data=designation+desc+ctc+gross+perks+bond+cgpa+written+interview+other+deadline;
	$('#preview_data').html('');
    $('#preview_data').append(data);
	$('#preview_data').dialog({
                resizable: false,
				
				async: false,
                //height:140,
				width: 500,
                modal: true,
                buttons: {
                    'Submit': function() {
                        //submit the form
                        $('#jaf').submit();
						$(this).dialog("close");
						//location.href="fill_jaf.php?status=success";
						//window.reload();
                    },
                    'Cancel': function() {
                        $(this).dialog("close");
                    }
                }
            });
			
			//location.href="fill_jaf.php?status=success";
}
		
function setvisible(){
	
    <?php if( isset($_SESSION['status']) && $_GET['status'] == 'success'){ $_SESSION['status']="success"; }?>

	var status="<?php echo $_SESSION['status']; ?>";
	if(status=="success") {
		//$('#successmessage').css('visibility','visible');
		$('#successmessage').html("Your Job was successfully added and sent to TPO-PEC! Fill the JAF again to add another job profile!");
		
	}
	/*<?php
   unset($_SESSION['status']);
   ?>*/
}

$(document).ready(function() {
	
    setvisible();
	$('#submitbtn').click(function(e) {
        e.preventDefault(); // don't submit multiple times
	    preview();
    });
});

</script>
<body>
    <div id="wrapper">

        <?php include '../header-company.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <?php echo $_SESSION['cname']; ?> Recruitment At PEC
                        </h3>
                        <!--ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Please Fill In the Joint Announcement form to start the hiring process
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <!--button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button-->
                            <!--i class="fa fa-info-circle"></i--><strong>Please Fill In the Joint Announcement form to start the hiring process</strong>
							<br><br>
							<div id="successmessage">
							<strong>To add Multiple Job Profiles, Just fill this form multiple times!</strong>
							</div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
<div class="container">
<div id="preview_data" title="Preview JAF before Submission" style="display:none;"></div>
<form id="jaf" method="post" action="savejaf.php" class="col-md-5">
	   
	<h2>Job Details</h2>
	<div id="jobdetails">
	<p>
	<div class="form-group">
        <label for="designation">Job Designation </label>
        <input type="text" class="form-control input-lg" name="designation" required>
    </div>
	<div class="form-group">
        <label for="jobdesc">Job Description: </label>
       <textarea name="jobdesc" id="jobdesc" class="form-control input-lg" placeholder="Brief Job Description" required></textarea>
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company </label>
        <input type="number" class="form-control input-lg" name="ctc" required>
    </div>
	<div class="form-group">
        <label for="gross">Gross (Take home before Tax and other deuctions) </label>
        <input type="text" class="form-control input-lg" name="gross">
    </div>
	<div class="form-group">
        <label for="perks">Bonus/Perks/Incentives (if any) </label>
        <input type="text" class="form-control input-lg" name="perks">
    </div>
	<div class="form-group">
        <label for="bond">Bond or Service Contract (If yes, give details) </label>
        <input type="text" class="form-control input-lg" name="bond" required>
    </div>
	</p>
	</div>
	<h2>Selection Procedure</h2>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Pre-Placement Talk" name="pptalk">Pre-Placement Talk</input><br/><br/>
	<input type="checkbox" value="Shortlist from Resumes" name="shortlistfromresume">Shortlist from Resumes</input><br/><br/>
	<input type="checkbox" value="Group Discussion" name="gd">Group Discussion</input>
	</fieldset>
		
  </div>
  <div class="form-group">
        <label for="cgpa">CGPA Cut-Off (If any) </label>
        <input type="text" class="form-control input-lg" name="cgpa" required>
    </div>
	<div class="form-group">
	    <label for="written">Written Test</label>
		<select name="written" id="written" class="form-control input-lg">
        <option value="Technical">Technical</option>
  <option value="Aptitude">Aptitude</option>
  <option value="Both">Both</option>
  </select>
  </div>
  <div class="form-group">
	    <label for="interview">Interviews</label>
		<select name="interview" id="interview" class="form-control input-lg">
        <option value="In Person">In Person</option>
  <option value="Video Conferencing">Video Conferencing</option>
  </select>
  </div>
  <div class="form-group">
  <label for="other">Any other (Specify)</label>
  <input type="text" class="form-control input-lg" name="other" required>
  </div>
  <div class="form-group">
  <label for="dateofvisit">Date of Visit</label>
  <input type="date" class="form-control input-lg" name="dateofvisit">
  </div>
  <div class="form-group">
  <label for="deadline">Application Deadline</label>
  <input type="date" class="form-control input-lg" name="deadline" required>
  </div>  
  </div>
<button id="submitbtn" class="btn btn-primary btn-lg btn-block" width="100px">Preview</button>   
 
</form>
</div>

</body>
</html>