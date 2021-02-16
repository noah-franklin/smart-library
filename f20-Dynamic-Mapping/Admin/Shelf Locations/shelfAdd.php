<?php
	include ("../connect.php");
	// if submit button is pressed, process inputs 
	if (isset($_POST['submit']))
	{
		// store inputs in variables
		$ShelfNo = $conn->real_escape_string($_POST['ShelfNo']);
		$X = $conn->real_escape_string($_POST['X']);
		$Y = $conn->real_escape_string($_POST['Y']);
		$Width = $conn->real_escape_string($_POST['Width']);
		$Height = $conn->real_escape_string($_POST['Height']);
		$Map = $conn->real_escape_string($_POST['Map']);
		//add to database
		if ($stmt = $conn->prepare("INSERT INTO shelflocations (ShelfNo, X, Y, Width, Height, Map) VALUES (?,?,?,?,?,?)"))
		{
			$stmt->bind_param("isssss",$ShelfNo,$X,$Y,$Width,$Height,$Map);
			$stmt->execute();
			$stmt->close();
			header("Location: shelfLocations.php");			
		}
		else
		{
			echo "Error: Unable to complete add request.";
		}
	}
	$conn->close();
?>
