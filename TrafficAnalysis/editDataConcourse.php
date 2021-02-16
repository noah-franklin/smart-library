<?php 
	require 'config.php';
	// if submit is pressed, submit the form with updated data
	if (isset($_POST['submit']))
	{
		$idNo = $conn->real_escape_string($_POST['id']);
		$count = $conn->real_escape_string($_POST['count']);
	
		
		
		if ($stmt = $conn->prepare("UPDATE concourse SET count = ? WHERE id = $idNo"))
		{
			$stmt->bind_param("i",$count);
			$stmt->execute();
			$stmt->close();
			header("Location: displayDataConcourse.php");
		}
		else
		{
			echo "Error: Unable to complete edit request.";
		}
	}	
	$conn->close();
?>	
