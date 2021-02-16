<?php
require 'config.php';
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Display Chart</title>
 
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Display Chart</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    	<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

	    <link rel="shortcut icon" href="assets/ico/favicon.png">


        <!-- load Google AJAX API -->
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
            //load the Google Visualization API and the chart
            google.load('visualization', '1', {'packages':['columnchart','piechart']});
 
            //set callback
            google.setOnLoadCallback (createChart);
 
            //callback function
            function createChart() {
 
                //create data table object
                var dataTable = new google.visualization.DataTable();
 
                //define columns
	            dataTable.addColumn('string','Area');
                dataTable.addColumn('number', 'Totals');
 
          <?php 
                require 'config.php';

                date_default_timezone_set('America/New_York');
                $date = date('Y-m-d');


                echo $date;





				$sql = "SELECT SUM(count) FROM main_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $main_floor_result = $conn->query($sql);
                $main_row = $main_floor_result->fetch_array();

                

                $sql = "SELECT SUM(count) FROM concourse where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $concourse_result = $conn->query($sql);
                $concourse_row = $concourse_result->fetch_array();

                
                $sql = "SELECT SUM(count) FROM ground_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
                $ground_floor_result = $conn->query($sql);
                $ground_row = $ground_floor_result->fetch_array(); 
                
                $testrow = array($main_row[0], $concourse_row[0], $ground_row[0] );

                
           ?>

	             var main_totals = <?php echo json_encode($main_row) ?>;
                 var concourse_totals = <?php echo json_encode($concourse_row) ?>;
                 var ground_totals = <?php echo json_encode($ground_row) ?>;
                 var test_totals = <?php echo json_encode($testrow) ?>;
	      
                //define rows of data
                dataTable.addRows([['Main Floor',parseInt(test_totals[0])], ['Concourse',parseInt(test_totals[1])],['Ground Floor',parseInt(test_totals[2])]]);
 
                //instantiate our chart object
                var chart = new google.visualization.ColumnChart (document.getElementById('chart'));
		        var secondChart = new google.visualization.PieChart (document.getElementById('chart2')); 		

                //define options for visualization
                var options = {width: 400, height: 240, is3D: true};
 
                //draw our chart
                chart.draw(dataTable, options);
		        secondChart.draw(dataTable, options);
 
            }
        </script>
 
    </head>
 
    <body>
 
	<h2>Cumulative Visit Stats for Today</h2>
        <!--Div for charts -->
        <div id="chart"></div>
	<div id="chart2"></div>
	<div>
   	  <a href="admin.php" class="btn btn-lg active" role="button" >Return to previous page</a>
	</div>
    <?php date_default_timezone_set('America/New_York');
                $date = date('Y-m-d');


                echo $date;
                ?>
    </body>
</html>