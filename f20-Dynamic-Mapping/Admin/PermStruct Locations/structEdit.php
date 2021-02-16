<?php 
	include ("../connect.php");
	// if submit is pressed, submit the form with updated data
	if (isset($_POST['submit']))
	{
		$StructID = $conn->real_escape_string($_POST['StructID']);
		$Type = $conn->real_escape_string($_POST['Type']);
		$X = $conn->real_escape_string($_POST['X']);
		$Y = $conn->real_escape_string($_POST['Y']);
		$Width = $conn->real_escape_string($_POST['Width']);
		$Height = $conn->real_escape_string($_POST['Height']);
		$Map = $conn->real_escape_string($_POST['Map']);
		
		if ($stmt = $conn->prepare("UPDATE permstructlocations SET Type = ?, X = ?, Y = ?, Width = ?, Height = ?, Map = ? WHERE StructID = $StructID"))
		{
			$stmt->bind_param("issssi",$Type,$X,$Y,$Width,$Height,$Map);
			$stmt->execute();
			$stmt->close();
			header("Location: structLocations.php");
		}
		else
		{
			echo "Error: Unable to complete edit request.";
		}
	}	
	$conn->close();
?>	
