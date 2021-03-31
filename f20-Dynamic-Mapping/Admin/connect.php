<?php
    // $servername = "localhost";
    // $username = "p_f17_7";
    // $password = "191fne";
    // $database = "p_f17_7_db";
    $servername = process.env.SERVER_NAME;
    $username = process.env.USERNAME;
    $password = process.env.PASSWORD;
    $database = process.env.DATABASE;

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn -> connect_error) 
    {
      
        die("Connection failed" .$conn->connect_error);
      
    }
?> 