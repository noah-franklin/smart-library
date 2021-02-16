<?php 
	include ("../connect.php");
	// if submit is pressed, submit the form with updated data
	if (isset($_POST['submit']))
	{
		$ShelfNo = $conn->real_escape_string($_POST['ShelfNo']);
		$First = $conn->real_escape_string($_POST['First']);
		$Last = $conn->real_escape_string($_POST['Last']);
		$Map = $conn->real_escape_string($_POST['Map']);
	
	    if ($stmt = $conn->prepare("UPDATE booklocations SET First = ?, Last = ?, Map = ? WHERE ShelfNo = $ShelfNo"))
		{
			$stmt->bind_param("sss",$First,$Last,$Map);
			$stmt->execute();
			$stmt->close();
			header("Location: bookLocations.php");
		}
		else
		{
			echo "Error: Unable to complete edit request.";
		}
	}
	$conn->close();
?>	
