<?php 
session_start();
include '../functions.php'; 
?>
<html>
<head>
<title>My Applications</title>
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
$(document).ready(function(){
	$.ajax({
		url: 'getapplications.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#app').html(rethtml);
			
		},
		error: function() {
		    $('#app').html("<h3>Error</h3>");
	    }
	});
	
});
</script>
<body>
    <div id="wrapper">

        <?php include '../header-student.php'; ?>
		

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            Recruitment at PEC- Student Panel
                        </h3>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<div class="alert alert-info alert-dismissable">
	<div id="successmessage">
	<strong>My Applications!</strong>
	</div>
	</div>
	<div id="app">
	</div>
	</body>
	</html>