<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forecaster</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

 	    <link rel="shortcut icon" href="assets/ico/favicon.png">

         <style>
            body {
                background-color: #090809;
            }


         </style>

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
                            //Nick added code
                $servername = "localhost";
                $username = "p_f17_3";
                $password = "45trzb";
                $dbname = "test";

                date_default_timezone_set('America/New_York');
                $date = date('Y-m-d');

                


                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                    echo'failer';
                } 



                //request data from today only 
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

    </head>

    <body>
            
        <?php
            $servername = "localhost";
            $username = "p_f17_3";
            $password = "45trzb";
            $dbname = "test";

            //seat capacity of the floors
            $overallSeat = 679;
            $mainSeat = 299;
            $concourseSeat = 200;
            $groundSeat = 180;



            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                echo'failer';
            } 



            $sql = "SELECT id, time, average  FROM `overall_average`";
            $result = $conn->query($sql);

            $overall = array();

            //echo 'Overall data input  <br>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
                    $overall[] = $row["average"];
                }
            } else {
                echo "0 results";
            }




            $sql = "SELECT id, time, average  FROM `concourse_average`";
            $result = $conn->query($sql);

            $concourse = array();

            //echo 'concourse data input  <br>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
                    $concourse[] = $row["average"];
                }
            } else {
                echo "0 results";
            }


            $sql = "SELECT id, time, average  FROM `ground_floor_average`";
            $result = $conn->query($sql);

            $ground = array();

            //echo 'Ground data input  <br>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
                    $ground[] = $row["average"];
                }
            } else {
                echo "0 results";
            }

            $sql = "SELECT id, time, average  FROM `main_average`";
            $result = $conn->query($sql);

            $main = array();

            //echo 'Main data input  <br>';

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    //echo "id: " . $row["id"] . " time: " . $row["time"] . " Average: " . $row["average"].  "<br>";
                    $main[] = $row["average"];
                }
            } else {
                echo "0 results";
            }



        ?>

        

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
            
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Forecaster</h1>
			    <h3>Sojourner Truth Library - SUNY New Paltz</h3>
                        </div>
                    </div>

                    <div class="hidden-xs justify-content-cente col-sm-2 col-sm-offset-5 schedule-legend">
                            <div class="row justify-content-center">
                                <div class="text-white" style="background-color:#00C851;" >  ( Capacity <10% ) </div>
                                <div class="alert-success text-black" style="background-color:#fbfb22;" > ( Capacity <25% )</div>
                                <div class="alert-warning text-white" style="background-color:#ffbb33;"> ( Capacity <50% ) </div>
                                <div class="alert-danger text-white" style="background-color:#ff4444">  ( Capacity >50% )</div>
                                
                                <div class="alert-dark text-white"  ></div>                 
                             
                                
                            </div>
                        </div>

                    <div style="position:relative;">
                            <table class="reservations" border="1" cellpadding="0" width="100%">
                                <thead>
                                    <tr class="today"> 
                                            <td class="resdate"> Today's <?php echo "date: " . date(' m/d/Y'); ?> </td>
                                                <td class="reslabel " colspan="1">8:00 AM</td>

                                                <td class="reslabel" colspan="1">9:00 AM</td>
                                                
                                                <td class="reslabel" colspan="1">10:00 AM</td>
                                                
                                                <td class="reslabel" colspan="1">11:00 AM</td>
                                                
                                                <td class="reslabel" colspan="1">12:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">1:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">2:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">3:00 PM</td>
                                               
                                                <td class="reslabel" colspan="1">4:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">5:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">6:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">7:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">8:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">9:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">10:00 PM</td>
                                                
                                                <td class="reslabel" colspan="1">11:00 PM</td>
                                                
            
                                        </tr>
                                     </thead>
                            <tbody>
                                    <tr class="slots">
                                        <td class="resourcename">
     
    
                                        
                                    </tr>
                    <tr class="slots">
                            <td class="resourcename">
                                    <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Overall</a>
                                                                                </td>
                                    <?php   //goes through the data compare for which level of business         
                                     for ($i = 0; $i < 16; $i++) {
                                            
                                        if($overall[$i] < ($overallSeat /10)  ){
                                            echo '<td colspan="1" class="text-white" style="background-color:#00C851;" ></td>' ;
                                        }elseif ($overall[$i] < ($overallSeat /4)  ){
                                            echo '<td colspan="1" class="alert-success text-white" style="background-color:#fbfb22;" ></td>' ;
                                        }elseif ($overall[$i] < ($overallSeat /2) ) {
                                            echo '<td colspan="1" class="alert-warning text-dark" style="background-color:#ffbb33;" ></td>';
                                        }else{
                                            echo '<td colspan="1" class="alert-danger text-white" style="background-color:#ff4444" ></td>';
                                        }

                                    }
                                    ?>
                                  


                                    </tr>
                        
                    </tr>
   
    
                        
                    </tr>
                    <tr class="slots">
                        <td class="resourcename">
                                     <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Main: Top Floor</a>
                         </td>
                                    <?php          
                                     for ($i = 0; $i < 16; $i++) {
                                            
                                        if($main[$i] < ($mainSeat /10)  ){
                                            echo '<td colspan="1" class="text-white" style="background-color:#00C851;" ></td>' ;
                                        }elseif ($main[$i] < ($mainSeat /4)  ){
                                            echo '<td colspan="1" class="alert-success text-white" style="background-color:#fbfb22;" ></td>' ;
                                        }elseif ($main[$i] < ($mainSeat /2) ) {
                                            echo '<td colspan="1" class="alert-warning text-dark" style="background-color:#ffbb33;" ></td>';
                                        }else{
                                            echo '<td colspan="1" class="alert-danger text-white" style="background-color:#ff4444" ></td>';
                                        }

                                    }
                                    ?>

                                    </tr>
                        
                    </tr>
                    <tr class="slots">
                        <td class="resourcename">
                                <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Concourse: Mid Floor</a>
                        </td>
                                    <?php          
                                     for ($i = 0; $i < 16; $i++) {
                                            
                                        if($concourse[$i] < ($concourseSeat /10)  ){
                                            echo '<td colspan="1" class="text-white" style="background-color:#00C851;" ></td>' ;
                                        }elseif ($concourse[$i] < ($concourseSeat /4)  ){
                                            echo '<td colspan="1" class="alert-success text-white" style="background-color:#fbfb22;" ></td>' ;
                                        }elseif ($concourse[$i] < ($concourseSeat /2) ) {
                                            echo '<td colspan="1" class="alert-warning text-dark" style="background-color:#ffbb33;" ></td>';
                                        }else{
                                            echo '<td colspan="1" class="alert-danger text-white" style="background-color:#ff4444" ></td>';
                                        }

                                    }
                                    ?>
                                </tr>
                    
                                 </tr>
                    
                        
                    
    
                                    <tr class="slots">
                                            <td class="resourcename">
                                                    <a href="" resourceid="3" class="resourceNameSelector" resource-details-bound="1">Ground: Bottom Floor</a>
                                            </td>
                                    <?php          
                                     for ($i = 0; $i < 16; $i++) {
                                            
                                        if($ground[$i] < ($groundSeat /10)  ){
                                            echo '<td colspan="1" class="text-white" style="background-color:#00C851;" ></td>' ;
                                        }elseif ($ground[$i] < ($groundSeat /4)  ){
                                            echo '<td colspan="1" class="alert-success text-white" style="background-color:#fbfb22;" ></td>' ;
                                        }elseif ($ground[$i] < ($groundSeat /2) ) {
                                            echo '<td colspan="1" class="alert-warning text-dark" style="background-color:#ffbb33;" ></td>';
                                        }else{
                                            echo '<td colspan="1" class="alert-danger text-white"  ></td>';
                                        }

                                    }
                                    ?>          
               
                                    </tr>
                                       
                                   </tr>
                                        
                                    
                                                                                       
                                </tbody>
                            </table>
                        </div>


                        </div>

                                

                        <!-- desplay the charts -->
                        <p> <span id="datetime"></span></p>
                        <h2 style="color:white;">Cumulative Visit Stats for Today</h2>
                                <!--Div for charts -->
                                <div >
                                    <a id="chart"></a>
                                    <div class="col-sm-2 col-sm-offset-2">
                                    <a id="chart2"></a>
                                </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        
        
	    


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        
        <script src="assets/js/scripts.js"></script>
        <script src="assets/js/navagation.ts"></script>

        <script>
            var dt = new Date();
            document.getElementById("datetime").innerHTML = dt.toLocaleString();
        </script>

        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>