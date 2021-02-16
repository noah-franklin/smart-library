<?php 
	include ("../connect.php");
	// if submit is pressed, submit the form with updated data
	if (isset($_POST['submit']))
	{
		$ShelfNo = $conn->real_escape_string($_POST['ShelfNo']);
		$X = $conn->real_escape_string($_POST['X']);
		$Y = $conn->real_escape_string($_POST['Y']);
		$Width = $conn->real_escape_string($_POST['Width']);
		$Height = $conn->real_escape_string($_POST['Height']);
		$Map = $conn->real_escape_string($_POST['Map']);
		
		if ($stmt = $conn->prepare("UPDATE shelflocations SET X = ?, Y = ?, Width = ?, Height = ?, Map = ? WHERE ShelfNo = $ShelfNo"))
		{
			$stmt->bind_param("ssssi",$X,$Y,$Width,$Height,$Map);
			$stmt->execute();
			$stmt->close();
			header("Location: shelfLocations.php");
		}
		else
		{
			echo "Error: Unable to complete edit request.";
		}
	}	
	$conn->close();
?>	
