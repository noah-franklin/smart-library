
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Table Display</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

	 <link rel="shortcut icon" href="assets/ico/favicon.png">
<style>
body {
  padding-top: 20px;
  padding-left: 30px;
}

th, td {
    border: 1px solid black;
    padding: 8px;
    color: black;
}
</style>
</head>
<body>
<div>
   <h2>Today's Visit Statistics</h2>
   <p>Date & Time: <span id="datetime"></span></p>
</div>

<a href="admin.php" class="btn btn-lg active" role="button" >Return to previous page</a>

<?php
  require 'config.php';

    

    date_default_timezone_set('America/New_York');
    $date = date('Y-m-d');

    $time = array();


    $sql = "SELECT * FROM main_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
    $main_floor_result = $conn->query($sql);

    $main = array();

    

    if ($main_floor_result->num_rows > 0) {
        // output data of each row
        while($row = $main_floor_result->fetch_assoc()) {
            $main[] = $row["count"];  //get the head count store iin array 
            $time[] = $row["dateTime"];  //get date and time store in array
        }
    } else {
        echo "  ";
    }

    //request only current date information
    $sql = "SELECT * FROM concourse where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
    $concourse_result = $conn->query($sql);

    $concourse = array();


    if ($concourse_result->num_rows > 0) {
        // output data of each row
        while($row = $concourse_result->fetch_assoc()) {
            $concourse[] = $row["count"];
        }
    } else {
        echo " ";
    }

    $sql = "SELECT * FROM ground_floor where dateTime between '$date 00:00:00' and '$date 23:59:00' ";
    $ground_floor_result = $conn->query($sql);

    $ground = array();

    if ($ground_floor_result->num_rows > 0) {
        // output data of each row
        while($row = $ground_floor_result->fetch_assoc()) {
            $ground[] = $row["count"];
        }
    } else {
        echo " ";
    }

    $num_rows = mysqli_num_rows($main_floor_result);
    //echo $num_rows . '<br>';

   

  if ($main_floor_result->num_rows > 0) {
    echo "<table><tr>
	<th>Time</th>
	<th>Main Floor</th>
	<th>Concourse</th>
	<th>Ground Floor</th>
    </tr>";
    
    //output data of each row
    for($x  = 0; $x < $num_rows; $x++) {
        echo "<tr><td>" . $time[$x] . 
        "</td><td>" . $main[$x] . 
        "</td><td>".$concourse[$x] .
        "</td><td>".$ground[$x].
        "</td></tr>";
    } 


    echo "</table>";
} else {
    echo "No data enter today";
}



$conn->close();
?>

<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
</script>

</body>
</html>
