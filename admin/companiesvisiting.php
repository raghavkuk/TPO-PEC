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
<script type="text/javascript">
function searchTable(inputVal,tableid)
{
	var id=tableid.substring(2);
	var table = document.getElementById(id);
	$(table).find('tr').each(function(index, row)
	{
		var allCells = $(row).find('td');
		if(allCells.length > 0)
		{
			var found = false;
			allCells.each(function(index, td)
			{
				var regExp = new RegExp(inputVal, 'i');
				if(regExp.test($(td).text()))
				{
					found = true;
					return false;
				}
			});
			if(found == true)$(row).show();else $(row).hide();
		}
	});
}
function refresh()
{
	location.reload();
}
function preview(id)
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
			window.location.href="companiesvisiting.php?deleted=true";
		},
		error: function()
		{
			$('#status').css('visibility','visible');
		    $('#status').text("Error Deleting! Try after some time..");
		}
						});
                        
						
				    },
                    'Cancel': function() {
                        $(this).dialog("close");
                    }
                }
            });	
}
$(document).ready(function(){
	$('#message').html('');
	var deleted="<?php if(isset($_GET['deleted'])){ if($_GET['deleted']=='true'){ echo "true"; }} else echo "false";?>";
	if(deleted=="true")
	{
		$('#status').css('visibility','visible');
		$('#status').text("Successfully deleted");
		
	}
	$.ajax({
		url: 'getvisitingcompanies.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#visitingcompanies').html(rethtml);
			
			var message_status = $("#status2");
			//$(".date").datepicker({dateFormat: 'yyyy-mm-dd'});
			var value="";
			$(".date").change(function(){
				$(this).val(new Date().toISOString().substring(0,10));
				value=$(this).val();
		        $(this).parent().focus();
			});
				$('.search').keyup(function()
	    {
		searchTable($(this).val(),$(this).attr("id"));
     	});
			$("td[contenteditable='true']").blur(function(){
		
        var field_userid = $(this).attr("id") ;
        
        if(value!="" || value!="YYYY-MM-DD")
		{
		$.post('saverecords2.php' , field_userid + "=" + value, function(data){
            if(data != '')
            {
                message_status.show();
                message_status.text(data);
                //hide the message
                setTimeout(function(){message_status.hide()},3000);
            }
        });
	}
    });
		},
		error: function() {
		    $('#visitingcompanies').html("<h3>Error</h3>");
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
                            Recruitment at PEC- Admin Panel- COMPANIES VISITING @ PEC
                        </h3>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<!--div class="alert alert-info alert-dismissable">
	<div id="successmessage">
	</div>
	</div-->
	<h4 align="center" id='status' style="visibility:hidden; background-color: aqua; padding-top: 5px; padding-bottom: 5px; margin-bottom: 5px; width: 50% "></h4>
    <h4 align="center" id='status2' style="display:none; background-color: aqua; padding-top: 5px; padding-bottom: 5px; margin-bottom: 5px; width: 50% "></h4>	
	<h4 align="center">Edit the dates and click Refresh OR Remove a Company!</h4>
	<div class='container'>
	<div id="preview_data" title="Confirm Removal of Company!" style="display:none;"></div>
	<div id="visitingcompanies">
	</div>
	</div>
	</body>
	</html>