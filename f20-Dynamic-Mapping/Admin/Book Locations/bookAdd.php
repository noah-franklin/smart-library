<?php
	include ("../connect.php");
	// if submit button is pressed, process inputs 
	if (isset($_POST['submit']))
	{
		// store inputs in variables
		$ShelfNo = $conn->real_escape_string($_POST['ShelfNo']);
		$First = $conn->real_escape_string($_POST['First']);
		$Last = $conn->real_escape_string($_POST['Last']);
		$Map = $conn->real_escape_string($_POST['Map']);
		//add to database
		if ($stmt = $conn->prepare("INSERT INTO booklocations (ShelfNo, First, Last, Map) VALUES (?,?,?,?)"))
		{
			$stmt->bind_param("isss",$ShelfNo,$First,$Last,$Map);
			$stmt->execute();
			$stmt->close();
			header("Location: bookLocations.php");			
		}
		else
		{
			echo "Error: Unable to complete add request.";
		}
	}
	$conn->close();
?>
