<?php
require 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page - Staff </title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

	 <link rel="shortcut icon" href="assets/ico/favicon.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
            <div id="profile" align="right">
                <b id="welcome"> <i><?php echo $login_session; ?></i></b>
                <b id="logout"><a href="logout.php">Log Out</a></b>
            </div>
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1>Choices...</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        
                        
                
                 <!–- To enter the data -–> 
			    <a href="entry.htm" class="btn btn-primary btn-block btn-lg active"
                role="button" style="background-color: white; color: black;">Head entry</a>
                <!–-  -–>
    			<a href="displayChart.php" class="btn btn-primary btn-block btn-lg active"
                role="button" style="background-color: white; color: black;">Display Charts</a>
                <!–-  -–>
			    <a href="displaySqlTable.php" class="btn btn-primary btn-block btn-lg active"
                role="button" style="background-color: white; color: black;">View Today Table</a>
                <!–-  -–>
                <a href="forecast1.php" class="btn btn-primary btn-block btn-lg active"
				role="button" style="background-color: white; color: black;">Display Forecast</a>
		                    
		                    
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>