<!DOCTYPE html>
<html>
<body>

<p>HTML Hello</p>


<?php
		require 'config.php';
        
        
        
        //get records from database
	    $results_per_page = 25;
		$datatable = "main_floor";
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
            echo $num_rows . '<br>';
    
            
                
            if ($dataConcourse = $conn->query($sqlConcourse))
            {
                //create and display table of records if there are entries
                if ($dataConcourse->num_rows > 0)
                {
                    echo "concourse table data <br>";
                    echo "<table><tr><th>Date Time</th><th>Count</th><th></th><th></th>";
                    while ($row = $dataConcourse->fetch_object())
                    {
                        echo "<tr><td>" . $row->dateTime . "</td>";
                        echo "<td>" . $row->count . "</td>";
                        echo "<td><a href = 'javascript:edit(". $row->dateTime .")'>Edit<a/></td>";
                        echo "<td><a href = 'javascript:confirmDelete(". $row->dateTime .")'>Delete</a></td></tr>";
                    }
                }
                else
                {
                    echo "The database is curently empty!";
                }
                echo "</table>";
            }
        
        $sql2 = "SELECT COUNT(id) AS total FROM ".$datatable;
		$result = mysqli_query($conn,$sql2);
		$row = mysqli_fetch_assoc($result);
		$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
		
		for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages 
					$href = '"test.php?page='.$i.'"';
					echo "<button type='button' style='display:inline;' onclick='window.location.href=".$href."'";
					if ($i==$page) echo " class='curPage' ";
		
					 
					echo ">".$i."</button> ";
		}; 

        

		

		$conn->close();

?>

</body>
</html>


