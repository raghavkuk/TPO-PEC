<?php 

session_start();
include 'functions.php';

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

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="fill-jaf.php">Training & Placement Office, PEC Chandigarh</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
            
                
                <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
				    <li>
                        <a href="aboutcompany.php"><i class="fa fa-fw fa-table"></i> About Company</a>
                    </li>
                    <li>
                        <a href="fill-jaf.php"><i class="fa fa-fw fa-dashboard"></i> Fill JAF</a>
                    </li>
					<li class="active">
                        <a href="downloadjaf.php"><i class="fa fa-fw fa-bar-chart-o"></i> Download JAF</a>
                    </li>
					<li>
                        <a href="contactdetails.php"><i class="fa fa-fw fa-dashboard"></i> Contact Details</a>
                    </li>
                    <li>
                        <a href="applications-company.php"><i class="fa fa-fw fa-bar-chart-o"></i> Applications</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-fw fa-table"></i> Send Queries</a>
                    </li>
					
                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
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