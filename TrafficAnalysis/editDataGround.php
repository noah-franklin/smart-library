<?php 
	require 'config.php';
	// if submit is pressed, submit the form with updated data
	if (isset($_POST['submit']))
	{
		$id = $conn->real_escape_string($_POST['id']);
		$count = $conn->real_escape_string($_POST['count']);
		
		
		if ($stmt = $conn->prepare("UPDATE ground_floor SET count = ? WHERE id = $id"))
		{
			$stmt->bind_param("i",$count);
			$stmt->execute();
			$stmt->close();
			header("Location: displayData.php");
		}
		else
		{
			echo "Error: Unable to complete edit request.";
		}
	}	
	$conn->close();
?>	
