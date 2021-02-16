<?php
require 'config.php'; 
define('dbname', 'p_f17_3_db');


session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql = mysqli_query($conn, "SELECT * FROM `Staff` WHERE `UserName` = '$user'") 
or die (mysqli_error()); 
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['UserName'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection

}
?>