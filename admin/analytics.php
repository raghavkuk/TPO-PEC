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
	<!--script type="text/javascript" src="../js/jquery-table2excel-master/src/jquery.table2excel.js"></script-->
	<script type="text/javascript" src="Highcharts-4.2.5/js/highcharts.js"></script>
	<script type="text/javascript" src="Highcharts-4.2.5/js/modules/exporting.js"></script>
	<script type="text/javascript" src="Highcharts-4.2.5/js/modules/offline-exporting.js"></script>
</head>
<script type="text/javascript">
function placementchart(cgpa,branch,gender)
{
	var placed=0,notplaced=0,studies=0,total=0,students;
	if(gender=='Both')
		students='Students';
    else if(gender=='Male')
		students='Males';
	else
		students='Females';
	$.ajax({
		url: 'getnumbers.php?cgpa='+cgpa+'&branch='+branch+'&gender='+gender,
		dataType: 'xml',
		success: function(retxml) {
			$(retxml).find('numbers').each(function(){
			placed = parseInt($(this).find('placedbe').text());
			notplaced = parseInt($(this).find('notplacedbe').text());
			studies = parseInt($(this).find('studiesbe').text());
			});
			if(branch=='All') branch='All Branches';
        	$('#numberplacedbe').highcharts({
		    exporting: {
            chartOptions: { // specific options for the exported image
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true,
							format: '<b>{point.name}</b><br><b>Number:</b>{point.y}<br><b>Percentage:</b>{point.percentage:.1f}%'
                        }
                    },
					
					
					
                },
				legend: {
						enabled: true
					},
					tooltip: {
						enabled: true
					}
            },
            scale: 3,
            fallbackToExportServer: false
        },
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Number of '+students+ ' (BE) placed with CGPA>='+cgpa+' of '+branch
            },
            tooltip: {
				pointFormat: '<b>Number:</b>{point.y}<br><b>Percentage:</b>{point.percentage:.1f}%'
                //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Students',
                colorByPoint: true,
                data: [{
                    name: 'Unplaced (Eligible) Students',
                    y: notplaced
                }, {
                    name: 'Placed Students',
                    y: placed,
                    sliced: true,
                    selected: true
                },
				{
                    name: 'Higher Studies',
                    y: studies
                }]
            }]
        });
			
		},
		error: function() {
		    $('#numberplacedbe').html("<h3>Error</h3>");
	    }
	});
}
function companylist()
{
	$.ajax({
		url: 'getcompanylist.php?prog=BE',
		dataType: 'html',
		success: function(rethtml) {
			$('#companyselect').html(rethtml);
			placementdata($('#companylist').val());
		},
		error: function() {
		    $('#companyselect').html("<h3>Error</h3>");
	    }
	});
}
function placementdata(company)
{
	$.ajax({
		url: 'getcompanydatabe.php?company='+company,
		dataType: 'html',
		success: function(rethtml) {
			$('#companywisebe').html(rethtml);
			
		},
		error: function() {
		    $('#companywisebe').html("<h3>Error</h3>");
	    }
	});
}
$(document).ready(function(){
	placementchart('6.5','All','Both');
	companylist();
	
	$('#companylist').change(function(){
		placementdata($('#companyselect').val());
	});
	$('#getchart').click(function()
	{
       placementchart($('#cgselect').val(),$('#branchselect').val(),$('#genderselect').val());
	});
		//chart2
	
		/*$('#monthwise').highcharts({
		exporting: {
            chartOptions: { // specific options for the exported image
                plotOptions: {
                    series: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                }
            },
            scale: 3,
            fallbackToExportServer: false
        },
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Placement Numbers'
        },
        
        xAxis: {
            categories: [
                'Aug 2015',
                'Sep 2015',
                'Oct 2015',
                'Nov 2015',
                'Dec 2015'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Number of Students Placed'
            }
        },
        
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Number of Students placed',
            data: [49, 71, 66, 29, 44]

        }]
    });*/
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
	<div id="analyics" class='container'>
	<h2 align="center">Placement trends</h2>
	<div class='row'>
	<div class='col-md-3'>
	<h4>Select CGPA</h4>
	<select name='cg' id='cgselect'>
	<option value='6.5'>Default (>6.5)</option>
	<option value='5'>>=5</option>
	<option value='5.5'>>=5.5</option>
	<option value='6'>>=6</option>
	<option value='6.5'>>=6.5</option>
	<option value='7'>>=7</option>
	<option value='7.5'>>=7.5</option>
	<option value='8'>>=8</option>
	<option value='8.5'>>=8.5</option>
	<option value='9'>>=9</option>
	</select>
	</div>
	<div class='col-md-3'>
	<h4>Select Branch</h4>
	<select name='branch' id='branchselect'>
	<option value='All'>All</option>
	<option value='Aerospace'>Aerospace</option>
	<option value='Civil'>Civil</option>
	<option value='Computer Science'>Computer Science</option>
	<option value='Electrical'>Electrical</option>
	<option value='Electronics and Communiction'>Electronics and Communiction</option>
	<option value='Mechanical'>Mechanical</option>
	<option value='Metallurgy'>Metallurgy</option>
	<option value='Production'>Production</option>
	</select>
	</div>
	<div class='col-md-4'>
	<h4>Gender</h4>
	<select name='gender' id='genderselect'>
	<option value='Both'>Both</option>
	<option value='Male'>Male</option>
	<option value='Female'>Female</option>
	</select>
	<button id='getchart'>Get Data</button>
	</div>
	</div>
	<br>
	<div id="numberplacedbe" style="width: 80%; margin: 0 auto;"></div><br><br>
	<div class='row'>
	<div class='col-md-3'>
	<h4>Select Company</h4>
	<div id="companyselect"></div>
	<br><br>
	</div>
	</div>
	<div id="companywisebe" style="width: 80%; margin: 0 auto;"><h4 align='center'><br><br><br>Select Values above to get data!</h4></div><br><br>
	<!--div id="monthwise" align="center" style="width: 80%; margin: 0 auto;"></div-->
	</div>	
</body>
</html>