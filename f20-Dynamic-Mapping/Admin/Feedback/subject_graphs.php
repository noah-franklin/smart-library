<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../Admin.css">
	</head>
		
	<body>
	<div id = "wrapper">
			<div id = "header-div">
				<h1> Visualization Based on Subjects </h1>
			</div>
			
			<div id = "nav-div">
				<ul>
					<li><a href = "../adminPanel.html">Main</a></li>
					<li><a href = "../Book Locations/bookLocations.php">Book Locations</a></li>
					<li><a href = "../Shelf Locations/shelfLocations.php">Shelf Locations</a></li>
					<li><a href = "feedback.php">Feedback Statistics</a></li>
					<li><a href = "../../index.html">Logout</a></li>
				</ul>
			</div>
			
			<div id = "graphmain">
				<img src = "legend.png" height = "40px" style = "position: fixed; right: 0px; z-index: 1; border: 1px solid #ccc; box-shadow: -5px 6px 8px #A9A9A9;"></img>
	
<?php
	function draw ($subject = '', $chart = '', $yes = '', $no = '', $size = '')
	{
?>		
		<script type="text/javascript">
			
			google.charts.load('current', {'packages':['corechart']});
			google.charts.setOnLoadCallback(drawChart);
			
			function drawChart() 
			{
				var data = google.visualization.arrayToDataTable([
				['Feedback', 'Count', { role: 'style' }],
				['Found', <?php echo $yes ?>, '#96d1ea'],
				['Not Found', <?php echo $no ?>, '#ffb1aa']
				]);

				var pie_options = {
				width: <?php echo $size ?>,
                height: <?php echo $size ?>,
				colors: ['#96d1ea','#ffb1aa'],
				legend: 'none',
				pieSliceTextStyle: {fontSize: 12},
				tooltip: {textStyle: {fontSize: 12}},
				chartArea: {width: '80%', height: '80%'}
				};
				
				var pie_chart = new google.visualization.PieChart(document.getElementById('pie_<?php echo $chart ?>'));
				pie_chart.draw(data, pie_options);
				
				var bar_options = {
				title: '<?php echo $subject ?>',
				titleTextStyle: {fontSize: 18, bold: true},
			    width: 800,
				height: 300,
				hAxis: {textStyle: {color: 'gray'}, ticks: [0,10,20,30,40,50,60,70,80,90,100]},
				vAxis: {textStyle: {color: 'gray', bold: true}},
				legend: 'none',
				chartArea: {left: '120', width: '70%'}
				};
				
				var bar_chart = new google.visualization.BarChart(document.getElementById('bar_<?php echo $chart ?>'));
				bar_chart.draw(data, bar_options);		
			}
		</script>
<?php
}
?>
				<table id = "graphs" >
				<tr>
				<td><div id = bar_total_chart></div></td>
				<td><div id = pie_total_chart></div></td>
				</tr>

				<?php
				    include ("../connect.php");
				 	$sql = "SELECT DISTINCT Subject FROM FeedBack";
                	if($fbdata = $conn->query($sql))
                	{
                	    // if the table exists
	             	if ($fbdata->num_rows > 0)
	            	{
						  while ($row = $fbdata->fetch_object())
		               {
						$trimsubject = str_replace(' ', '', "$row->Subject");
				 ?>

						<tr>
						<td><div id = bar_<?php echo $trimsubject ?>_chart></div></td>
						<td><div id = pie_<?php echo $trimsubject ?>_chart></div></td>
						</tr>
                <?php
					   }
					}
					}
				?>

				</table>
			</div>
		</div>
	</body>
</html>
<?php
	include ("../connect.php");
	function setRadius ($total)
	{
		$minR = 100;
		$maxR = 400;
		$maxT = 20;
		if ($total > $maxT)
		{
			$total = $maxT;
		}
		$r = $total * ($maxR/$maxT);
		if ($r < $minR)
		{
			$r = $minR;
		}
		return $r;		
	}

	if ($data = $conn->query ("SELECT Found FROM FeedBack"))
	{	
		$yes = 0;
		$no = 0;
		$subject = 'Total';
		$chart = 'total_chart';
		if ($data->num_rows > 0)
		{
			while ($row = $data->fetch_object())
			{
				if ($row->Found == '1'){$yes++;}
				else if ($row->Found == '0'){$no++;}
			}
		}
		$radius = setRadius($yes+$no);
		draw($subject,$chart,$yes,$no,$radius);
	}

    // get all disctinct subject from feedback table
	$sql = "SELECT DISTINCT Subject FROM FeedBack order by Subject ASC";
	if($subdata = $conn->query($sql))
	{
	    // if the table exists
		if ($subdata->num_rows > 0)
		{
			//get each row
		  while ($row = $subdata->fetch_object())
		  {
			//get each row to check to see the number of found and not found 
			 if ($data = $conn->query ("SELECT Found FROM FeedBack WHERE Subject = '$row->Subject'"))
			 {	
				// yes and no will count what's found or not found based on the query
				$yes = 0;
				$no = 0;
				$subject = "$row->Subject";
				$trimsubject = str_replace(' ', '', $subject);
				$chart = $trimsubject."_chart";

					// check that data exists
					if ($data->num_rows > 0)
					{
						// fetch the Found values and increment variables
						while ($row = $data->fetch_object())
						{
						  if ($row->Found == '1'){$yes++;}
						   else if ($row->Found == '0'){$no++;}
						}
					}
            
					// send all the data to google chart function
					$radius = setRadius($yes+$no);
					draw($subject,$chart,$yes,$no,$radius);
			}
		}

 	}else{
		 echo "it is empty";
	 }
	}
 

?>