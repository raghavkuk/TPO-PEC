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
    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
</head>
<script type="text/javascript">
$(document).ready(function(){
	var cid = <?php echo $_SESSION['cid']; ?>;
	var about = <?php if (isset($_SESSION['about'])) {echo $_SESSION['about'];} ?>;
	
    if(cid != 0 || about == 1){
        $.ajax({
        	url: "loadabout.php",
        	data: id=<?php echo $_SESSION['cid']; ?>,
        	dataType: 'html',
        	success: function(rethtml) {
        		$('#aboutform').hide();
        		$('#aboutcompany').html(rethtml);
        	},
        	error: function() {
        		$('#aboutcompany').html("<h3>Error</h3>");
        	}
        });
    }
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
				    <li class="active">
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
    <!-- /#wrapper -->
	
    <div id="aboutcompany">
	</div>
	
    <div class="container">
	   <form id="aboutform" method="post" action="saveabout.php" class="col-md-5">
            
            <div class="form-group">
                <label for="name">Company Name: </label>
                <input type="text" class="form-control input-lg" name="name" required>
            </div>
            
            <div class="form-group">
	            <label for="about">About Company: </label>
                <textarea name="about" class="form-control input-lg" placeholder="Brief description about the company" required></textarea>    
	        </div>
	   
            <div class="form-group">
                <label for="sector">Industry Sector: </label>
		        <select name="sector" class="form-control input-lg">
                    <option value="Analytics/KPO">Analytics/KPO</option>
                    <option value="Consultancy">Consultancy</option>
                    <option value="VLSI/Embedded Systems">VLSI/Embedded Systems</option>
                    <option value="Finance">Finance</option>
                    <option value="Civil/Infrastructure">Civil/Infrastructure</option>
                    <option value="Manufacturing/Automobile">Manufacturing/Automobile</option>
                    <option value="Software">Software</option>
                    <option value="Eletronics/Communication">Eletronics/Communication</option>
                    <option value="Core(Technical)">Core(Technical)</option>
                    <option value="Teaching and Research">Teaching and Research</option>
                    <option value="">Other</option>
                </select>
            </div>
	       
           <div class="form-group">
	           <input type="submit" value="Save" name="submit" class="btn btn-primary btn-lg btn-block"/>
	       </div>
        </form>
	</div>
</body>
</html>