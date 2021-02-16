<?php
	require 'config.php';
	
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$idNo = $_GET['id'];
		if ($stmt = $conn->prepare("DELETE FROM main_floor WHERE id = ? LIMIT 1"))
		{
			$stmt->bind_param("i",$idNo);
			$stmt->execute();
			$stmt->close();
			// refresh page after deletion
			header ("Location: displayDataMain.php");
		}
		else
		{
			echo "ERROR: Cannot complete delete request.";
		}
	}
	$conn->close();
?>