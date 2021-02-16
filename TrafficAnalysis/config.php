<?php

if (!defined('servername')) define('servername', 'localhost');
if (!defined('username')) define('username', 'p_f17_3');
if (!defined('password')) define('password', '45trzb');
if (!defined('dbname')) define('dbname', 'p_f17_3_db');

$conn = mysqli_connect(servername, username, password, dbname) or die('Error connecting to MySQL server.');

?>