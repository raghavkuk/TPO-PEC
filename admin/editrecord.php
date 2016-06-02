<?php
session_start();
include '../functions.php'; 
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<!--script type="text/javascript" src="../datatables/media/js/jquery.dataTables.js"></script-->
	<script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script>
	
	
</head>
<style>
.ui-accordion { width: 90%; margin: 0 auto; } 
.ui-accordion .ui-accordion-header { text-align: center; font-weight:bold; cursor: pointer; position: relative; margin-top: 10px; zoom: 1;margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px; }
.ui-accordion .ui-accordion-li-fix { display: inline; }
.ui-accordion .ui-accordion-header-active { border-bottom: 0 !important; }
.ui-accordion .ui-accordion-header a { display: block; font-size: 1em; padding: .5em .5em .5em .7em; }
.ui-accordion-icons .ui-accordion-header a { padding-left: 2.2em;}
.ui-accordion .ui-accordion-header .ui-icon { position: absolute; left: .5em; top: 50%; margin-top: -8px; }
.ui-accordion .ui-accordion-content { padding: 1em 2.2em; border-top: 0; margin-top: -2px; position: relative; top: 1px; margin-bottom: 2px; overflow: auto; display: none; zoom: 1; }
.ui-accordion .ui-accordion-content-active { display: block; }
</style>
<script type="text/javascript">
function download(tableid) {
	var tables = document.getElementById(tableid);
	var caption=$(tables).find('caption').text();
	
	$(tables).table2excel({
		filename: caption,
		exclude: ".noExl1",
		exclude_img: true,
		exclude_links: true
		//exclude_inputs: true
	});
	//$(tables).tableToCSV();
}
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
$(document).ready(function(){
	
    //acknowledgement message
	$.ajax({
		url: 'fetchrecords.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#editrecord').html(rethtml);
			$('#editrecord').accordion({
				collapsible: true,
				heightStyle: "content",
				active: false
			});
			/*$("table").each(function(){
				var curtable=$(this);
				$(curtable).DataTable(
				{
					 paging: false
			    });
			});*/
			var message_status = $("#status");
            var value="";
            var selectbox=0;	
        $('.search').keyup(function()
	    {
		searchTable($(this).val(),$(this).attr("id"));
     	});			
		$(".status").change(function()
	    {
		   value=$(this).val();
		   selectbox=1;
		   $(this).parent().focus();
	    });
		$(".eligible").change(function()
	    {
		   value=$(this).val();
		   selectbox=1;
		   $(this).parent().focus();
	    });
		$(".blocked").change(function()
	    {
		   value=$(this).val();
		   selectbox=1;
		   $(this).parent().focus();
	    });
    $("td[contenteditable='true']").blur(function(){
		
        var field_userid = $(this).attr("id") ;
        if(selectbox==0){
		value = $(this).text() ;
		}
		
        
		$.post('saverecords.php' , field_userid + "=" + value, function(data){
            if(data != '')
            {
                message_status.show();
                message_status.text(data);
                //hide the message
                setTimeout(function(){message_status.hide()},3000);
            }
        });
		selectbox=0;
	
    });
		},
		error: function() {
		    $('#editrecord').html("<h3>Error</h3>");
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
                            Recruitment at PEC- Admin Panel- PLACEMENT DETAILS (B.E.)
                        </h3>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
	<div class='container'>
	<h4 align="center">Click on any field to edit it, then wait a sec and it will be saved! </h4>
	<h4 id='status' style="display: none; background-color: aqua; padding-top: 5px; padding-bottom: 5px; margin-bottom: 5px; width: 50% "></h4>
	<div id="editrecord" class='container'>
	</div>	
	</div>
</body>
</html>