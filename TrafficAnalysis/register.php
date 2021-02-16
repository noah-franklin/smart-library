<?php
require 'config.php';

$NPid = $_POST['id'];
$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$access = mysqli_real_escape_string($conn, $_POST['access']);

$sql = "INSERT INTO staffTest(npid, username, password, email, access)
	VALUES('$NPid', '$user', '$pass', '$email','$access')";

if (mysqli_query($conn, $sql)) {
    
        header("Location: admin.php");
    
} else {
    echo "Error:  " . $sql . "<br>" . mysqli_error($conn);
} 

mysqli_close($conn);
?>