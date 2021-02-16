<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Edit & View Concourse Data Table</title>

            <!-- CSS -->
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
			<link rel="stylesheet" href="assets/css/form-elements.css">
			<link rel="stylesheet" href="assets/css/style.css">
            <link rel="shortcut icon" href="assets/ico/favicon.png">

			
			<script type = "text/javascript">
				function confirmConcourseDelete(id)
				{
					if (confirm("Are you sure you want to delete this record?"))
					{
						window.location.href = "concourseDelete.php?id=" + id;
					}
				} 
				function editConcourse(id)
				{
					document.getElementById('editConcourse').style.display = 'block';
					document.getElementById('id').value = id;
				}
				function add()
				{
					document.getElementById('add').style.display = 'block';
				}
			</script>

			


    </head>
    <body>

    <div>
        <h2>Visit Statistics - Concourse</h2>
        <p>Date & Time: <span id="datetime"></span></p>
    </div>
	<a href="floorMenu.htm" class="btn btn-lg active" role="button" >Return to Floor page</a>
	<a href="admin.php" class="btn btn-lg active" role="button" >Return to admin page</a>
	
	
    <?php
		require 'config.php';
		//get records from database
	    $results_per_page = 25;
		$datatable = "concourse";
		if (isset($_GET["page"])) { 
			$page  = $_GET["page"]; 
			} else { 
				$page=1; 
			}; 
         $start_from = ($page-1) * $results_per_page;
            //import code form displaysqlTable 

     
		
     


        $sqlConcourse = "SELECT * FROM concourse ORDER BY id LIMIT $start_from, " .$results_per_page;
        $concourse_floor_result = $conn->query($sqlConcourse);


        $num_rows = mysqli_num_rows($concourse_floor_result);
        

        
            
        if ($dataConcourse = $conn->query($sqlConcourse))
        {
            //create and display table of records if there are entries
            if ($dataConcourse->num_rows > 0)
            {
                echo "<br><h3><b>Concourse Data Table</b><h3> <br><br> "; // Title 
                echo "<table><tr><th>ID</th><th>Date Time</th><th>Count</th><th></th><th></th>"; // create the header of the table 
                while ($row = $dataConcourse->fetch_object())
                {
					echo "<tr><td>" . $row->id . " || </td>";
                    echo "<td>" . $row->dateTime . "||</td>";
                    echo "<td>" . $row->count . "</td>";
					echo "<td><button onclick = 'javascript:editConcourse(". $row->id .")'> Edit </button></td>";
                    echo "<td><button onclick = 'javascript:confirmConcourseDelete(". $row->id .")'>Delete</button></td></tr>";
                }
            }
            else
			{
                echo "<br>Concourse table data <br>";  
				echo "Concourse table - No more data curently Avalable<br>";
			}
			echo "</table>";
        }

        $sqlGround = "SELECT * FROM ground_floor ORDER BY id LIMIT $start_from, " .$results_per_page;
        $ground_floor_result = $conn->query($sqlGround);


        $num_rows = mysqli_num_rows($ground_floor_result);
       

		
            
	

		$sql2 = "SELECT COUNT(id) AS total FROM ".$datatable;
		$result = mysqli_query($conn,$sql2);
		$row = mysqli_fetch_assoc($result);
		$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
		
		for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages 
					$href = '"displayDataConcourse.php?page='.$i.'"';
					echo "<button type='button' style='display:inline;' onclick='window.location.href=".$href."'";
					if ($i==$page) echo " class='curPage' ";
		
					 
					echo ">".$i."</button> ";
		}; 

		$conn->close();
	?>
	 
	
	
		<!-- Pop up window for the edit -->
		<div id = "editConcourse" class = "modal">
			<form class = "modal-content animate" action = "editDataConcourse.php" method = "post">
				<div class = "imgcontainer">
					<span onclick = "document.getElementById('editConcourse').style.display = 'none'" class = "close" title = "Close Modal">&times;</span>
				</div>
				<div class = "container">
					<h1 class = "modalh1"> Edit Record Concourse </h1>
					<label>ID number</label><input id = "id" type = "" name = "id" value = "" readonly><br>
					<br><label>Count</label><input type = "number" name = "count" value = ""><br> 
					<br><input class = "modalbutton" type = "submit" name = "submit" value = "Submit">
				</div>
				<div class = "container" style = "background-color: #f1f1f1">
					<button class = "modalbutton cancelbtn" type = "button" onclick = "document.getElementById('editConcourse').style.display = 'none'">Cancel</button>
				</div>
			</form>
		</div>

		




		<script>
		var modal1 = document.getElementById('add');
		var modal2 = document.getElementById('editConcourse');
		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) 
		{
			if (event.target == modal1 || event.target == modal2 ) 
			{
				modal1.style.display = "none";
				modal2.style.display = "none";

			}
		}
		</script>


        <script>
        var dt = new Date();
        document.getElementById("datetime").innerHTML = dt.toLocaleString();
        </script>

    </body>
</html>