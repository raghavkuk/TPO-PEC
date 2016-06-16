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
	var announcement= "<font size='3'><strong>Announcement: </strong></font><font size='4'>"+$('input[name="ann"]').val()+"</font><br>";
	var jafs= "<font size='3'><strong>Send to Applicants of: </strong></font><font size='4'>"+$('#company').val()+"</font><br>";
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
	var data=announcement+jafs+branchesbe+branchesbeint+branchesme;
	$('#preview_data').html('');
    $('#preview_data').append(data);
	$('#preview_data').dialog({
                resizable: false,
				width: 500,
                modal: true,
                buttons: {
                    'Submit': function() {
                        
                        $('#sendannouncement').submit();
						$(this).dialog("close");
				    },
                    'Cancel': function() {
                        $(this).dialog("close");
                    }
                }
            });	
}
function setvisible(){
	
    <?php if( isset($_SESSION['statusann']) && $_SESSION['statusann']=="success"){ $_SESSION['statusann']="success"; } else {$_SESSION['statusann']="failure";}?>

	var status="<?php echo $_SESSION['statusann']; ?>";
	if(status=="success") {
		//$('#successmessage').css('visibility','visible');
		$('#successmessage').html('');
		$('#successmessage').html("The announcement was successfully sent.<br>");
		$('#successmessage').append("<strong>Fill details to add another Announcement..</strong>");
	    <?php $_SESSION['statusann']='failure'; ?>
	}
	else{
		$('#successmessage').html("<strong>Send an Announcement to Students</strong>");
	}
	/*<?php
   unset($_SESSION['status']);
   ?>*/
}
$(document).ready(function() {
	setvisible();
	$.ajax({
		url: 'getjafs.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#selectjaf').html(rethtml);
		},
		error: function() {
		    $('#selectjaf').html("<h3>Error</h3>");
	    }
	});
	
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
	<strong>Send an Announcement to Students</strong>
	</div>
	</div>
	<div class='container'>
	<div id="preview_data" title="Preview Announcement before Submission" style="display:none;"></div>
	<form id="sendannouncement" method="post" action="sendannouncement.php" class="col-md-5">
	<div class="form-group">
        <label for="cname">Announcement: </label>
        <input type="text" class="form-control input-lg" name="ann" required="true">
    </div>
	<div class="form-group">
        <label for="company">To the Applicants of: </label>
        <div id="selectjaf">
		</div>
    </div>
	<br>
	<h3>OR</h3>
	<br>
	<h4>Send to all students of these branches (B.E. Placement)</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Aerospace Engineering" id="aero" name="aero">Aerospace Engineering</input><br/><br/>
	<input type="checkbox" value="Civil Engineering" name="civil" id="civil">Civil Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering" name="cse" id="cse">Computer Science and Engineering</input><br/><br/>
	<input type="checkbox" value="Electronics and Communication Engineering" name="ece" id="ece">Electronics and Communication Engineering</input><br/><br/>
	<input type="checkbox" value="Electrical Engineering" name="ee" id="ee">Electrical Engineering</input><br/><br/>
	<input type="checkbox" value="Mechanical Engineering" name="mech" id="mech">Mechanical Engineering</input><br/><br/>
	<input type="checkbox" value="Materials and Metallurgical Engineering" name="meta" id="meta">Materials and Metallurgical Engineering</input><br/><br/>
	<input type="checkbox" value="Production and Industrial Engineering" name="prod" id="prod">Production and Industrial Engineering</input><br/>
	</fieldset>
  </div>
  <br>
  <h4>Send to all students of these branches (B.E. Internship)</h4>
  <div class="form-group">
	<fieldset>
	<input type="checkbox" value="Aerospace Engineering" id="aeroint" name="aeroint">Aerospace Engineering</input><br/><br/>
	<input type="checkbox" value="Civil Engineering" name="civilint" id="civilint">Civil Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering" name="cseint" id="cseint">Computer Science and Engineering</input><br/><br/>
	<input type="checkbox" value="Electronics and Communication Engineering" name="eceint" id="eceint">Electronics and Communication Engineering</input><br/><br/>
	<input type="checkbox" value="Electrical Engineering" name="eeint" id="eeint">Electrical Engineering</input><br/><br/>
	<input type="checkbox" value="Mechanical Engineering" name="mechint" id="mechint">Mechanical Engineering</input><br/><br/>
	<input type="checkbox" value="Materials and Metallurgical Engineering" name="metaint" id="metaint">Materials and Metallurgical Engineering</input><br/><br/>
	<input type="checkbox" value="Production and Industrial Engineering" name="prodint" id="prodint">Production and Industrial Engineering</input><br/>
	</fieldset>
  </div>
  <br>
	<h4>Send to all students of these branches (M.E.)</h4>
	<div class="form-group">
	<fieldset>
	<input type="checkbox" value="Industrial Materials and Metallurgy" name="meind" id="meind">Industrial Materials and Metallurgy</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Irrigation and Hydraulics)" name="mecivilwr" id="mecivilwr">Civil Engineering (Irrigation and Hydraulics)</input><br/><br/>
	<input type="checkbox" value="Environmental Engineering" name="meenv" id="meenv">Environmental Engineering</input><br/><br/>
	<input type="checkbox" value="Transportation Engineering" name="metran" id="metran">Transportation Engineering</input><br/><br/>
	<input type="checkbox" value="Production and Industrial Engineering" name="meprod" id="meprod">Production and Industrial Engineering</input><br/><br/>
	<input type="checkbox" value="Electrical Engineering" name="meee" id="meee">Electrical Engineering</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Structures)" name="mecivilstru" id="mecivilstru">Civil Engineering (Structures)</input><br/><br/>
	<input type="checkbox" value="Civil Engineering (Highways)" name="mecivilhigh" id="mecivilhigh">Civil Engineering (Highways)</input><br/><br/>
	<input type="checkbox" value="Electronics (VLSI) Engineering" name="meecevlsi" id="meecevlsi">Electronics (VLSI) Engineering</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering" name="mecse" id="mecse">Computer Science </input><br/><br/>
	<input type="checkbox" value="Industrial Design Engineering" name="meinddes" id="meinddes">Industrial Design</input><br/><br/>
	<input type="checkbox" value="Mechanical Engineering" name="memech" id="memech">Mechanical</input><br/><br/>
	<input type="checkbox" value="Computer Science and Engineering (Information Security)" name="meis" id="meis">Computer Science (Information Security)</input><br/><br/>
	<input type="checkbox" value="Electronics Engineering" name="meece" id="meece">Electronics</input><br/><br/>
	<input type="checkbox" value="Total Quality Engineering and Management" name="metqem" id="metqem">Total Quality Engineering and Management</input><br/><br/>
	</fieldset>
  </div>
	<!--div class="form-group">
        <label for="confirmpass">Confirm Password: </label>
        <input type="password" class="form-control input-lg" name="confirmpass" required>
    </div-->
	</form>
	<br>
		<button id="submitbtn" class="btn btn-primary btn-lg btn-block" style='width: 70%;'>Preview</button>   
	</div>
</body>
</html>