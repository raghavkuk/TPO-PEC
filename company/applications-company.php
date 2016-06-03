<?php

session_start();

include '../functions.php'; 

?>

<html>
<head>
<title><?php echo $_SESSION['cname']; ?></title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
	<link href="../css/sb-admin.css" rel="stylesheet">
	<link href="../css/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script>
</head>
<style>
.ui-accordion { width: 100%; margin: 0 auto; } 
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
		exclude: ".noExl",
		filename: caption
	});
}

$(document).ready(function(){
	$.ajax({
		url: 'fetchapplications.php',
		dataType: 'html',
		success: function(rethtml) {
			$('#applications').html(rethtml);
			$('#applications').accordion({
				collapsible: true,
				heightStyle: "content",
				active: false
			});
		},
		error: function() {
		    $('#applications').html("<h3>Error</h3>");
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
					<li>
                        <a href="downloadjaf.php"><i class="fa fa-fw fa-bar-chart-o"></i> Download JAF</a>
                    </li>
					<li>
                        <a href="contactdetails.php"><i class="fa fa-fw fa-dashboard"></i> Contact Details</a>
                    </li>
					
                    <li class="active">
                        <a href="applications-company.php"><i class="fa fa-fw fa-bar-chart-o"></i> Applications</a>
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
                        <h3 align="center"  class="page-header">
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
							<br><br>
							<strong>To add Multiple Job Profiles, Just fill this form multiple times!</strong>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <div id="applications" class='container'>
	</div>	
</body>
</html>