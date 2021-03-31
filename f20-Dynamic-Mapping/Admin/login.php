<?php
	include ("connect.php");
	// check if submit is pressed, then process inputs
	if (isset($_POST['submit']))
	{
		$Username = $conn->real_escape_string($_POST['Username']);
		$Password = $conn->real_escape_string($_POST['Password']);
		$stmt = $conn->query("SELECT * FROM login WHERE Username = '{$Username}' AND Password = '{$Password}' LIMIT 1");
		// if a match is found, direct to admin controls page
		if ($stmt->num_rows == 1)
		{
			header ("Location: ./index.html");
			echo "<script>
        window.open('adminPanel.html', '_blank')
    </script>";
		}
		//check that all fields are filled
		else
		{
			echo "Error: Invalid Login Credentials.";
	
			echo "<br><br><a href=\"javascript:history.go(-1)\"><button type = 'submit' name = 'retry'> Retry </button></a>";
		}
	}
	$conn->close();
?>
