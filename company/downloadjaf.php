<?php 

session_start();
include '../functions.php';

?>
<html>
<head>
<title><?php echo $_SESSION['cname'] ?></title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/thickbox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/thickbox.js"></script>	
	<script type="text/javascript" src="../js/formpreview.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">

$(document).ready(function(){
	$.ajax({
		url: 'filledjaf.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#jafs').html(rethtml);
		},
		error: function() {
		    $('#jafs').html("<h3>Error</h3>");
	    }
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
                        <h3  align="center" class="page-header">
                            <?php echo $_SESSION['cname'] ?> Recruitment At PEC
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
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
	<div id="jafs"></div>
</body>
</html>