<?php
    $serverName="localhost";
    $userName="root";
    $password="";
    $dbName="tms_db";
    $connection = new mysqli($serverName,$userName,$password,$dbName);
    if($connection->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
    ?>
?>