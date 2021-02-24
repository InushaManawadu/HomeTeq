<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'hometeq';
    
    //Creating DB Connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if (!$conn){
        die('Could not connect: ' . mysqli_error($conn));
    }
    //select the database
    mysqli_select_db($conn, $dbname);
?>