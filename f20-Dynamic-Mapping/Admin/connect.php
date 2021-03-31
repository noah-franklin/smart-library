<?php
    $servername = "localhost";
    $username = "p_f17_7";
    $password = "191fne";
    $database = "p_f17_7_db";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn -> connect_error) 
    {
      
        die("Connection failed" .$conn->connect_error);
      
    }
?> 