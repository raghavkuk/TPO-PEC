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
	<!--script type="text/javascript" src="../js/jquery.table2excel.js"></script-->
	<!--script type="text/javascript" src="../js/tableexport/tableExport.js"></script>
	<script type="text/javascript" src="../js/tableexport/jquery.base64.js"></script-->
	<script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script>
</head>
<script type="text/javascript">
function download(tableid) {
	var tables = document.getElementById(tableid);
	var caption=$(tables).find('caption').text();
	//tableToExcel('comp', 'W3C Example Table');
	$('#comp').table2excel({
		filename: caption,
		name: 'companies'
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
	
	$.ajax({
		url: 'getvisitedcompanies.php',
		dataType: 'html',
		success: function(rethtml) {
			
			$('#visitedcompanies').html(rethtml);
			$('.search').keyup(function()
	    {
		searchTable($(this).val(),$(this).attr("id"));
     	});
			
		},
		error: function() {
		    $('#visitedcompanies').html("<h3>Error</h3>");
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
	<!--div class="alert alert-info alert-dismissable">
	<div id="successmessage">
	</div>
	</div-->
	<div id="visitedcompanies">
	</div>
	</body>
	</html>