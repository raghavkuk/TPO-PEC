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
	<script type="text/javascript" src="../js/jquery.table2excel.js"></script>
</head>
<style>
#col1{
	
    width:40%;
    float:left;
    padding:5px; 
}
#col3{
	width:10%;
	float: left;
	padding:5px;
}
#col2{
	width:40%;
    float:left;
    padding:10px; 
}
</style>
<script type="text/javascript">
function preview() {
	//var title="<h3 align='center'>Preview JAF Before Submission</h3>"
	var jobtype="<font size='3'><strong>Job-Type: </strong></font><font size='4'>"+$('#type').val()+"</font><br>";
	var designation="<font size='3'><strong>Job Designation: </strong></font><font size='4'>"+$('input[name="designation"]').val()+"</font><br>";
	var desc="<font size='3'><strong>Job Description: </strong></font><font size='4'>"+$('#jobdesc').val()+"</font><br>";
	var ctc="<font size='3'><strong>Cost to Company: </strong></font><font size='4'>"+$('input[name="ctc"]').val()+"</font><br>";
	var gross="<font size='3'><strong>Gross: </strong></font><font size='4'>"+$('input[name="gross"]').val()+"</font><br>";
	var perks="<font size='3'><strong>Perks: </strong></font><font size='4'>"+$('input[name="perks"]').val()+"</font><br>";
	var bond="<font size='3'><strong>Bond: </strong></font><font size='4'>"+$('input[name="bond"]').val()+"</font><br>";
	var cgpa="<font size='3'><strong>CGPA Cut-Off: </strong></font><font size='4'>"+$('input[name="cgpa"]').val()+"</font><br>";
	var prog="<font size='3'><strong>Programmes Allowed: </strong></font><font size='4'>"+$('#prog').val()+"</font><br>";
	var branchesbe="<font size='3'><strong>Branches in BE: </strong></font><font size='4'>";
	if(aero.checked)
		branchesbe=branchesbe+"Aerospace"+"<br>";
	if(civil.checked)
		branchesbe=branchesbe+"Civil<br>";
	if(cse.checked)
		branchesbe=branchesbe+"Computer Science<br>";
	if(ece.checked)
		branchesbe=branchesbe+"Electronice and Commuication<br>";
	if(ee.checked)
		branchesbe=branchesbe+"Electrical<br>";
	if(mech.checked)
		branchesbe=branchesbe+"Mechanical<br>";
	if(meta.checked)
		branchesbe=branchesbe+"Metallurgy<br>";
	if(prod.checked)
		branchesbe=branchesbe+"Production<br>";
	branchesbe=branchesbe+"</font><br>";
	if(aero.checked&&civil.checked&&cse.checked&&ece.checked&&ee.checked&&mech.checked&&meta.checked&&prod.checked)
		branchesme="<font size='3'><strong>Branches in BE:</strong></font><font size='4'>All</font><br>";
	if(!aero.checked&&!civil.checked&&!cse.checked&&!ece.checked&&!ee.checked&&!mech.checked&&!meta.checked&&!prod.checked)
		branchesme="<font size='3'><strong>Branches in BE:</strong></font><font size='4'>NA</font><br>";
	var branchesme="<font size='3'><strong>Branches in ME: </strong></font><font size='4'>";
	if(meaero.checked)
		branchesme=branchesme+"Aerospace"+"<br>";
	if(mecivil.checked)
		branchesme=branchesme+"Civil<br>";
	if(mecse.checked)
		branchesme=branchesme+"Computer Science<br>";
	if(meece.checked)
		branchesme=branchesme+"Electronice and Commuication<br>";
	if(meee.checked)
		branchesme=branchesme+"Electrical<br>";
	if(memech.checked)
		branchesme=branchesme+"Mechanical<br>";
	if(memeta.checked)
		branchesme=branchesme+"Metallurgy<br>";
	if(meprod.checked)
		branchesme=branchesme+"Production<br>";
	branchesme=branchesme+"</font><br>";
	if(meaero.checked&&mecivil.checked&&mecse.checked&&meece.checked&&meee.checked&&memech.checked&&memeta.checked&&meprod.checked)
		branchesme="<font size='3'><strong>Branches in ME:</strong></font><font size='4'>All</font><br>";
	if(!meaero.checked&&!mecivil.checked&&!mecse.checked&&!meece.checked&&!meee.checked&&!memech.checked&&!memeta.checked&&!meprod.checked)
		branchesme="<font size='3'><strong>Branches in ME:</strong></font><font size='4'>NA</font><br>";
	var written="<font size='3'><strong>Written: </strong></font><font size='4'>"+$('#written').val()+"</font><br>";
	var interview="<font size='3'><strong>Interview: </strong></font><font size='4'>"+$('#interview').val()+"</font><br>";
	var selproc="<font size='3'><strong>Selection Procedure: </strong></font><font size='4'>";
	if(pptalk.checked)
		selproc=selproc+"Pre-Placement Talk<br>";
	if(shortlistfromresume.checked)
		selproc=selproc+"Shortlist from Resumes";
	if(gd.checked)
		selproc=selproc+"Group Discussion";
	selproc=selproc+"</font><br>";
	var other="<font size='3'><strong>Other: </strong></font><font size='4'>"+$('input[name="other"]').val()+"</font><br>";
	var deadline="<font size='3'><strong>Application Deadline: </strong></font><font size='4'>"+$('input[name="deadline"]').val()+"</font><br>";
	var dateofvisit="<font size='3'><strong>Date of Visit: </strong></font><font size='4'>"+$('input[name="dateofvisit"]').val()+"</font><br>";
	var data=jobtype+designation+desc+ctc+gross+perks+bond+cgpa+prog+branchesbe+branchesme+written+interview+other+dateofvisit+deadline;
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

$(document).ready(function(){
	var jafid=<?php echo $_GET['jaf_id']?>;
	$.ajax({
		url: 'editjafdetails.php?jafid='+jafid,
		dataType: 'html',
		success: function(rethtml) {
			$('#editform').html(rethtml);
			$('#editbtn').click(function(e) {
        e.preventDefault(); // don't submit multiple times
	    preview();
        });
			
		},
		error: function() {
		    $('#editform').html("<h3>Error</h3>");
	    }
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
	<strong>Following are companies that sent a fresh JAF. Edit the JAF and send to the students..</strong>
	</div>
	</div>
	<div class='container'>
	<div id="preview_data" title="Preview JAF before Submission" style="display:none;"></div>
	<div id="editform">
	</div>
	</div>
	</body>
	</html>