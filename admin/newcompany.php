<?php 
session_start();
$_SESSION['sent'] = "failure";
include '../functions.php'; 
$_SESSION['successedit']='fail';
if(isset($_GET['status']))
$_SESSION['successedit']=$_GET['status'];
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
<script type="text/javascript">
function preview2(id)
{
	var data="Are you sure you want to remove this company?";
	$('#preview_data').html('');
    $('#preview_data').append(data);
	$('#preview_data').dialog({
                resizable: false,
				width: 500,
                modal: true,
                buttons: {
                    'Yes': function() {
						$(this).dialog("close");
                        $.ajax({
		url: 'removecompany.php?jafid='+id,
		success: function(){
			window.location.href="newcompany.php?deleted=true";
		},
		error: function()
		{
			$('#successmessage').css('visibility','visible');
		    $('#successmessage').append("<br>Error Deleting! Try after some time..");
		}
						});
                        
						
				    },
                    'Cancel': function() {
                        $(this).dialog("close");
                    }
                }
            });	
}
function setvisible(){
	
    <?php if( isset($_SESSION['sent']) && isset($_GET['sent'])){ 
	if($_GET['sent']=='success')
	$_SESSION['sent']="success"; }?>

	var status="<?php echo $_SESSION['sent']; ?>";
	if(status=="success") {
		$('#successmessage').css('visibility','visible');
		$('#successmessage').append("<br>The JAF was successfully sent to eligible students! Review other JAFs!");
		
	}
	
	/*<?php
   unset($_SESSION['status']);
   ?>*/
}
function preview(x)
{
	var a="<form id='sendform' method='post' action='sendtostudents.php?jafid="+x+"'><h3>Send to eligible students?</h3><input type='submit'></form>", dialog;
			$('#preview_data').html('');
			$('#preview_data').append(a);
			dialog=$('#preview_data').dialog({
                resizable: false,
				async: false,
                //height:140,
				width: 500,
                modal: true,
				buttons: {
        
        'Cancel': function() {
          dialog.dialog( "close" );
        }
      }
            });
}
$(document).ready(function(){
	$('#message').html('');
	var deleted="<?php if(isset($_GET['deleted'])){ if($_GET['deleted']=='true'){ echo "true"; }} else echo "false";?>";
	if(deleted=="true")
	{
		//$('#successmessage').css('visibility','visible');
		$('#successmessage').append("<br>Successfully removed");
		
	}
	var status='<?php echo $_SESSION['successedit']?>';
	if(status=='success')
	{
		$('#successmessage').html('<strong>Following are companies that sent a fresh JAF. Edit the JAF and send to the students..</strong><br><br>JAF Details successfully edited!!!');
	}
	else
	{
		$('#successmessage').html('<strong>Following are companies that sent a fresh JAF. Edit the JAF and send to the students..</strong>');
	}
	setvisible();
	$.ajax({
		url: 'getnewcompanies.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#newcompanies').html(rethtml);
			$('.showform').click(function(){
				var x=$(this).attr('id');
				preview(x);
			});
		},
		error: function() {
		    $('#newcompanies').html("<h3>Error</h3>");
			
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
	</div>
	</div>
	<div id="preview_data" title="Sending Confirmation" style="display:none;">
	
	</div>
	<div id="newcompanies">
	
	</div>
	</body>
	</html>