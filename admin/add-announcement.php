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
		branchesbe=branchesbe+"Aerospace"+"<br>";
	if(civil.checked)
		branchesbe=branchesbe+"Civil<br>";
	if(cse.checked)
		branchesbe=branchesbe+"Computer Science<br>";
	if(ece.checked)
		branchesbe=branchesbe+"Electronics and Commuication<br>";
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
	var data=announcement+jafs+branchesbe+branchesme;
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
	<h4>Send to all students of these branches (B.E.)</h4>
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
  <br>
	<h4>Send to all students of these branches (M.E.)</h4>
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