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
	<script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script>
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
		branchesbe=branchesbe+"Aerospace Engineering"+"<br>";
	if(civil.checked)
		branchesbe=branchesbe+"Civil Engineering<br>";
	if(cse.checked)
		branchesbe=branchesbe+"Computer Science and Engineering<br>";
	if(ece.checked)
		branchesbe=branchesbe+"Electronics and Commuication Engineering<br>";
	if(ee.checked)
		branchesbe=branchesbe+"Electrical Engineering<br>";
	if(mech.checked)
		branchesbe=branchesbe+"Mechanical Engineering<br>";
	if(meta.checked)
		branchesbe=branchesbe+"Materials and Metallurgical Engineering<br>";
	if(prod.checked)
		branchesbe=branchesbe+"Production and Industrial Engineering<br>";
	branchesbe=branchesbe+"</font><br>";
	if(aero.checked&&civil.checked&&cse.checked&&ece.checked&&ee.checked&&mech.checked&&meta.checked&&prod.checked)
		branchesbe="<font size='3'><strong>Branches in BE:</strong></font><font size='4'>All</font><br>";
	if(!aero.checked&&!civil.checked&&!cse.checked&&!ece.checked&&!ee.checked&&!mech.checked&&!meta.checked&&!prod.checked)
		branchesbe="<font size='3'><strong>Branches in BE:</strong></font><font size='4'>NA</font><br>";
	var branchesbeint="<font size='3'><strong>Branches in BE Internship: </strong></font><font size='4'>";
	if(aeroint.checked)
		branchesbeint=branchesbeint+"Aerospace Engineering"+"<br>";
	if(civilint.checked)
		branchesbeint=branchesbeint+"Civil Engineering<br>";
	if(cseint.checked)
		branchesbeint=branchesbeint+"Computer Science and Engineering<br>";
	if(eceint.checked)
		branchesbeint=branchesbeint+"Electronics and Commuication Engineering<br>";
	if(eeint.checked)
		branchesbeint=branchesbeint+"Electrical Engineering<br>";
	if(mechint.checked)
		branchesbeint=branchesbeint+"Mechanical Engineering<br>";
	if(metaint.checked)
		branchesbeint=branchesbeint+"Materials and Metallurgical Engineering<br>";
	if(prodint.checked)
		branchesbeint=branchesbeint+"Production and Industrial Engineering<br>";
	branchesbeint=branchesbeint+"</font><br>";
	if(aeroint.checked&&civilint.checked&&cseint.checked&&eceint.checked&&eeint.checked&&mechint.checked&&metaint.checked&&prodint.checked)
		branchesbeint="<font size='3'><strong>Branches in BE Internship:</strong></font><font size='4'>All</font><br>";
	if(!aeroint.checked&&!civilint.checked&&!cseint.checked&&!eceint.checked&&!eeint.checked&&!mechint.checked&&!metaint.checked&&!prodint.checked)
		branchesbeint="<font size='3'><strong>Branches in BE Internship:</strong></font><font size='4'>NA</font><br>";
	var branchesme="<font size='3'><strong>Branches in ME: </strong></font><font size='4'>";
	if(meind.checked)
		branchesme=branchesme+"Industrial Materials and Metallurgy"+"<br>";
	if(mecivilwr.checked)
		branchesme=branchesme+"Civil Engineering (Irrigation and Hydraulics)<br>";
	if(meenv.checked)
		branchesme=branchesme+"Environmental Engineering<br>";
	if(metran.checked)
		branchesme=branchesme+"Transportation Engineering<br>";
	if(meprod.checked)
		branchesme=branchesme+"Production ad Industrial Engineering<br>";
	if(meee.checked)
		branchesme=branchesme+"Electrical Engineering<br>";
	if(mecivilstru.checked)
		branchesme=branchesme+"Civil Engineering (Structures)<br>";
	if(mecivilhigh.checked)
		branchesme=branchesme+"Civil Engineering (Highways)<br>";
	if(meecevlsi.checked)
		branchesme=branchesme+"Electronics(VLSI) Engineering<br>";
	if(mecse.checked)
		branchesme=branchesme+"Computer Science and Engineering<br>";
	if(meinddes.checked)
		branchesme=branchesme+"Industrial Design Engineering<br>";
	if(memech.checked)
		branchesme=branchesme+"Mechanical Engineering<br>";
	if(meis.checked)
		branchesme=branchesme+"Computer Science and Engineering (Information Security)<br>";
	if(meece.checked)
		branchesme=branchesme+"Electronics Engineering<br>";
	if(metqem.checked)
		branchesme=branchesme+"Total Quality Engineering and Management<br>";
	branchesme=branchesme+"</font><br>";
	if(meind.checked&&mecivilwr.checked&&mecivilhigh&&meenv.checked&&metran.checked&&meprod.checked&&meee.checked&&mecivilstru.checked&&meecevlsi.checked&&mecse.checked&&meinddes.checked&&memech.checked&&meis.checked&&meece.checked&&metqem.checked)
		branchesme="<font size='3'><strong>Branches in ME:</strong></font><font size='4'>All</font><br>";
	if(!meind.checked&&!mecivilwr.checked&&!mecivilhigh&&!meenv.checked&&!metran.checked&&!meprod.checked&&!meee.checked&&!mecivilstru.checked&&!meecevlsi.checked&&!mecse.checked&&!meinddes.checked&&!memech.checked&&!meis.checked&&!meece.checked&&!metqem.checked)
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