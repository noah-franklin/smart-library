<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="../Admin.css">
		<title> View FeedBack Statistics</title>
	</head>
	
	<body>
		<div id = "wrapper">
			<div id = "header-div">
				<h1> View FeedBack Statistics</h1>
			</div>
			
			<div id = "nav-div">
				<ul>
					<li><a href = "../adminPanel.html">Main</a></li>
					<li><a href = "../Book Locations/bookLocations.php">Book Locations</a></li>
					<li><a href = "../Shelf Locations/shelfLocations.php">Shelf Locations</a></li>
					<li><a href = "../PermStruct Locations/structLocations.php">Permanent Structure Locations</a></li>
					<li><a href = "feedback.php">Feedback Statistics</a></li>
					<li><a href = "../../index.html">Logout</a></li>
				</ul>
			</div>
			
			<div id = "main">
            <br>
			<table >
				<tr>
				<th>
				   <button type = "button" onClick = "window.location.href = 'shelf_graphs.php';"> Click here for visualization by Shelves.</button>
				</th>
				<th>
				    <button type = "button"  onClick = "window.location.href = 'subject_graphs.php';"> Click here for visualization by Subjects.</button>
				</th>
				</tr>

			</table>
			<br>
			
	<?php
		include ("../connect.php");
		//get records from database

		$results_per_page = 25;
		$datatable = "FeedBack";
		if (isset($_GET["page"])) { 
			$page  = $_GET["page"]; 
			} else { 
				$page=1; 
			}; 
         $start_from = ($page-1) * $results_per_page;
		 $sql = "SELECT * FROM " . $datatable . " ORDER BY ID LIMIT $start_from, " .$results_per_page;

	 
	   if ($data = $conn->query($sql))
		{
			//create and display table of records if there are entries
			if ($data->num_rows > 0)
			{
				echo "<table><tr><th>ID</th><th>Call No.</th><th>ShelfNo.</th><th>Found?</th><th>Time</th>";
				while ($row = $data->fetch_object())
				{
					echo "<tr><td>" . $row->ID . "</td>";
					echo "<td>" . $row->CallNo . "</td>";	
					echo "<td>" . $row->ShelfNo . "</td>";				
					echo "<td>" . $row->Found . "</td>";
					echo "<td>" . $row->Time . "</td>";
				}
			}
			else
			{
				echo "The database is curently empty!";
			}
			echo "</table>";
		}


		$sql2 = "SELECT COUNT(ID) AS total FROM ".$datatable;
		$result = mysqli_query($conn,$sql2);
		$row = mysqli_fetch_assoc($result);
		$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
		
		for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages 
					$href = '"feedback.php?page='.$i.'"';
					echo "<button type='button' style='display:inline;' onclick='window.location.href=".$href."'";
					if ($i==$page) echo " class='curPage' ";
		
					 
					echo ">".$i."</button> ";
		}; 
		$conn->close();
	?>
		</div>
	</div>	 		 
</body>
</html>