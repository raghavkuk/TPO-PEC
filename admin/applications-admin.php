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
	<link href="../datatables/media/css/dataTables.bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script>
	
</head>
<style>
.ui-accordion { width: 90%; margin: 0 auto; } 
.ui-accordion .ui-accordion-header { text-align: center; font-weight: bold;  cursor: pointer; position: relative; margin-top: 10px; zoom: 1;margin-bottom: 10px; padding-top: 10px; padding-bottom: 10px;  }
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
		exclude: '.noExl',
		exclude_img: true,
		exclude_links: true,
		exclude_inputs: true
	});
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
	$.ajax({
		url: 'getapplications.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#applications').html(rethtml);
			$('#applications').accordion({
				collapsible: true,
				heightStyle: "content",
				active: false
			});
			$('.search').keyup(function()
	       {
		      searchTable($(this).val(),$(this).attr("id"));
     	   });
			/*$('table').each(function(){
				var curtable=$(this);
				$(curtable).DataTable();
			});*/
		},
		error: function() {
		    $('#applications').html("<h3>Error</h3>");
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
	<div id="applications" class='container'>
	</div>	
</body>
</html>