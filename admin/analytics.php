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
	<script type="text/javascript" src="../js/jquery.table2excel.js"></script>
	<script type="text/javascript" src="Highcharts-4.2.5/js/highcharts.js"></script>
	<script type="text/javascript" src="Highcharts-4.2.5/js/modules/exporting.js"></script>
	<script type="text/javascript" src="Highcharts-4.2.5/js/modules/offline-exporting.js"></script>
</head>
<script type="text/javascript">
$(document).ready(function(){
	$('#numberplaced').highcharts({
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
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Number of Students Placed'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    name: 'Unplaced Students',
                    y: 56.33
                }, {
                    name: 'Placed Students',
                    y: 24.03,
                    sliced: true,
                    selected: true
                }]
            }]
        });
		
		//chart2
		
		$('#monthwise').highcharts({
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
	<div id="analyics" class='container'>
	<h2 align="center">Placement trends</h2>
	<div id="numberplaced" align="center" style="width: 80%; margin: 0 auto;"></div><br><br>
	<div id="monthwise" align="center" style="width: 80%; margin: 0 auto;"></div>
	</div>	
</body>
</html>