<?php
	include ("../connect.php");
	
	if (isset($_GET['StructID']) && is_numeric($_GET['StructID']))
	{
		$StructID = $_GET['StructID'];
		if ($stmt = $conn->prepare("DELETE FROM permstructlocations WHERE StructID = ? LIMIT 1"))
		{
			$stmt->bind_param("i",$StructID);
			$stmt->execute();
			$stmt->close();
			// refresh page after deletion
			header ("Location: structLocations.php");
		}
		else
		{
			echo "ERROR: Cannot complete delete request.";
		}
	}
	$conn->close();
?>