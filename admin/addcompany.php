<?php 
session_start();
include '../functions.php'; 

?>
<html>
<head>
<title>TPO-PEC</title>
<<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
function preview()
{
	var companyname= "<font size='3'><strong>Company Name: </strong></font><font size='4'>"+$('input[name="cname"]').val()+"</font><br>";
	var companyusername= "<font size='3'><strong>Company Username: </strong></font><font size='4'>"+$('input[name="cuser"]').val()+"</font><br>";
	var cpass= "<font size='3'><strong>Company Password: </strong></font><font size='4'>"+$('input[name="cpass"]').val()+"</font><br>";
	var data=companyname+companyusername+cpass;
	$('#preview_data').html('');
    $('#preview_data').append(data);
	$('#preview_data').dialog({
                resizable: false,
				width: 500,
                modal: true,
                buttons: {
                    'Submit': function() {
                        
                        $('#addcompany').submit();
						$(this).dialog("close");
				    },
                    'Cancel': function() {
                        $(this).dialog("close");
                    }
                }
            });	
}
function setvisible(){
	
    <?php if( isset($_SESSION['statusadd']) && $_SESSION['statusadd']=="success"){ $_SESSION['statusadd']="success"; } else {$_SESSION['statusadd']="failure";}?>

	var status="<?php echo $_SESSION['statusadd']; ?>";
	if(status=="success") {
		//$('#successmessage').css('visibility','visible');
		$('#successmessage').html('');
		$('#successmessage').html("The company was successfully added. You can send the mail to company with credentials<br>");
		$('#successmessage').append("<strong>Fill details to add another Company..</strong>");
	    <?php $_SESSION['statusadd']='failure'; ?>
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

        <?php include '../header-admin.html'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Recruitment at PEC- Admin Panel
                        </h3>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<div class="alert alert-info alert-dismissable">
	<div id="successmessage">
	<strong>Add following details to add a company to the panel</strong>
	</div>
	</div>
	<div class='container'>
	<div id="preview_data" title="Preview JAF before Submission" style="display:none;"></div>
	<form id="addcompany" method="post" action="insertcompany.php" class="col-md-5">
	<div class="form-group">
        <label for="cname">Company Name: </label>
        <input type="text" class="form-control input-lg" name="cname" required="true">
    </div>
	<div class="form-group">
        <label for="cuser">Company Username: </label>
        <input type="text" class="form-control input-lg" name="cuser" required="true">
    </div>
	<div class="form-group">
        <label for="cpass">Company Password: </label>
        <input type="password" class="form-control input-lg" name="cpass" required="true">
    </div>
	<!--div class="form-group">
        <label for="confirmpass">Confirm Password: </label>
        <input type="password" class="form-control input-lg" name="confirmpass" required>
    </div-->
	</form>
		<button id="submitbtn" class="btn btn-primary btn-lg btn-block">Preview</button>   
	</div>
</body>
</html>