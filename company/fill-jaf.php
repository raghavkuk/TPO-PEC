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
	var jobtype="<font size='3'><strong>Job Type: </strong></font><font size='4'>"+$('#type').val()+"</font><br>";
	var designation="<font size='3'><strong>Job Designation: </strong></font><font size='4'>"+$('input[name="designation"]').val()+"</font><br>";
	var desc="<font size='3'><strong>Job Description: </strong></font><font size='4'>"+$('#jobdesc').val()+"</font><br>";
	var ctc="<font size='3'><strong>Cost to Company: </strong></font><font size='4'>"+$('input[name="ctc"]').val()+"</font><br>";
	var ctcme="<font size='3'><strong>Cost to Company (if different for ME): </strong></font><font size='4'>"+$('input[name="ctcme"]').val()+"</font><br>";
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
	if(meind.checked)
		branchesme=branchesme+"Industrial Material Metallurgy"+"<br>";
	if(mecivilwr.checked)
		branchesme=branchesme+"Civil(Water Resources)<br>";
	if(meenv.checked)
		branchesme=branchesme+"Environmental Engineering<br>";
	if(metran.checked)
		branchesme=branchesme+"Transportation Engineering<br>";
	if(meprod.checked)
		branchesme=branchesme+"Production<br>";
	if(meee.checked)
		branchesme=branchesme+"Electrical<br>";
	if(mecivilstru.checked)
		branchesme=branchesme+"Civil(Structure)<br>";
	if(meecevlsi.checked)
		branchesme=branchesme+"Electronics(VLSI)<br>";
	if(mecse.checked)
		branchesme=branchesme+"Computer Science<br>";
	if(meinddes.checked)
		branchesme=branchesme+"Industrial Design<br>";
	if(memech.checked)
		branchesme=branchesme+"Mechanical<br>";
	if(meis.checked)
		branchesme=branchesme+"Computer Science (Information Security)<br>";
	if(meece.checked)
		branchesme=branchesme+"Electronics<br>";
	if(metqem.checked)
		branchesme=branchesme+"TQEM<br>";
	branchesme=branchesme+"</font><br>";
	if(meind.checked&&mecivilwr.checked&&meenv.checked&&metran.checked&&meprod.checked&&meee.checked&&mecivilstru.checked&&meecevlsi.checked&&mecse.checked&&meinddes.checked&&memech.checked&&meis.checked&&meece.checked&&metqem.checked)
		branchesme="<font size='3'><strong>Branches in ME:</strong></font><font size='4'>All</font><br>";
	if(!meind.checked&&!mecivilwr.checked&&!meenv.checked&&!metran.checked&&!meprod.checked&&!meee.checked&&!mecivilstru.checked&&!meecevlsi.checked&&!mecse.checked&&!meinddes.checked&&!memech.checked&&!meis.checked&&!meece.checked&&!metqem.checked)		
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
	var data=jobtype+designation+desc+ctc+ctcme+gross+perks+bond+cgpa+prog+branchesbe+branchesme+written+interview+other+dateofvisit+deadline;
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
	
    <?php if( isset($_SESSION['status']) && isset($_GET['status'])){ 
	if($_GET['status']=='success')
	$_SESSION['status']="success"; }?>

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
                        <h3 align="center"  class="page-header">
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
<form id="jaf" method="post" action="savejaf.php">
	  <div id="col1"> 
	<h2>Job Details</h2>
	<div id="jobdetails">
	<p>
	<div class="form-group">
	    <label for="prog">Job Type</label>
		<select name="type" id="type" class="form-control input-lg">
        <option value="Placement">Full-time</option>
  <option value="Internship">Internship</option>
  </select>
  </div>
	<div class="form-group">
        <label for="designation">Job Designation </label>
        <input type="text" class="form-control input-lg" name="designation" required>
    </div>
	
	<div class="form-group">
        <label for="jobdesc">Job Description: </label>
       <textarea name="jobdesc" id="jobdesc" class="form-control input-lg" placeholder="Brief Job Description" required></textarea>
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company/ Stipend (e.g. 900000 or 956000)</label>
        <input type="number" step="any" class="form-control input-lg" name="ctc">
    </div>
	<div class="form-group">
        <label for="ctc">Cost to Company (if different for ME; e.g. 1000000 or 1056800) </label>
        <input type="number" step="any" class="form-control input-lg" name="ctcme">
    </div>
	<div class="form-group">
        <label for="gross">Gross (Take home before Tax and other deuctions) </label>
        <input type="number" step="any" class="form-control input-lg" name="gross">
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
	
	<div class="form-group">
	    <label for="prog">Allowed programme(s)</label>
		<select name="prog" id="prog" class="form-control input-lg">
        <option value="BE">BE only</option>
  <option value="ME">ME only</option>
  <option value="BE/ME">Both BE and ME</option>
  </select>
  </div>
	<h4>Allowed Trades in B.E.</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Aerospace" id="aero" name="aero">Aerospace</input><br/><br/>
	<input type="checkbox" value="Civil" name="civil" id="civil">Civil</input><br/><br/>
	<input type="checkbox" value="Computer Science" name="cse" id="cse">Computer Science</input><br/><br/>
	<input type="checkbox" value="Electronics and Communication" name="ece" id="ece">Electronics and Communication</input><br/><br/>
	<input type="checkbox" value="Electrical" name="ee" id="ee">Electrical</input><br/><br/>
	<input type="checkbox" value="Mechanical" name="mech" id="mech">Mechanical</input><br/><br/>
	<input type="checkbox" value="Metallurgy" name="meta" id="meta">Metallurgy</input><br/><br/>
	<input type="checkbox" value="Production" name="prod" id="prod">Production</input><br/>
	</fieldset>
  </div>
  </div>
  <div id="col3"></div>
  <div id="col2">
  <br><br><br>
  <h4>Allowed Trades in M.E.</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Industrial Material Metallurgy" name="meind" id="meind">Industrial Material Metallurgy</input><br/><br/>
	<input type="checkbox" value="Civil (Water Resources)" name="mecivilwr" id="mecivilwr">Civil (Water Resources)</input><br/><br/>
	<input type="checkbox" value="Environmental Engineering" name="meenv" id="meenv">Environmental Engineering</input><br/><br/>
	<input type="checkbox" value="Transportation Engineering" name="metran" id="metran">Transportation Engineering</input><br/><br/>
	<input type="checkbox" value="Production" name="meprod" id="meprod">Production</input><br/><br/>
	<input type="checkbox" value="Electrical" name="meee" id="meee">Electrical</input><br/><br/>
	<input type="checkbox" value="Civil (Structure)" name="mecivilstru" id="mecivilstru">Civil (Structure)</input><br/><br/>
	<input type="checkbox" value="Electronics (VLSI)" name="meecevlsi" id="meecevlsi">Electronics (VLSI)</input><br/><br/>
	<input type="checkbox" value="Computer Science" name="mecse" id="mecse">Computer Science</input><br/><br/>
	<input type="checkbox" value="Industrial Design" name="meinddes" id="meinddes">Industrial Design</input><br/><br/>
	<input type="checkbox" value="Mechanical" name="memech" id="memech">Mechanical</input><br/><br/>
	<input type="checkbox" value="Computer Science (Information Security)" name="meis" id="meis">Computer Science (Information Security)</input><br/><br/>
	<input type="checkbox" value="Electronics" name="meece" id="meece">Electronics</input><br/><br/>
	<input type="checkbox" value="TQEM" name="metqem" id="metqem">TQEM</input><br/><br/>
	</fieldset>
  </div>
	<h2>Selection Procedure</h2>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Pre-Placement Talk" name="pptalk" id="pptalk">Pre-Placement Talk</input><br/><br/>
	<input type="checkbox" value="Shortlist from Resumes" name="shortlistfromresume" id="shortlistfromresume">Shortlist from Resumes</input><br/><br/>
	<input type="checkbox" value="Group Discussion" name="gd" id="gd">Group Discussion</input>
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
  </div>
<button id="submitbtn" class="btn btn-primary btn-lg btn-block" width="100px">Preview</button>   
 
</form>
</div>

</body>
</html>