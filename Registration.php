<?php

    // Create ne connection with database
    require_once "connect.php";
    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    // Check connection with database
    if($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_errno);
    }
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO clients(first_name, last_name, address, user, password)
    VALUES('$first_name', '$last_name', '$address', '$username', '$password')";
    if($connection->query($sql) === TRUE)
    {
        echo "New record created successfully.";
    }
    else
    {
        echo "Error: " .$sql.$connection->error;
    }
    
    $connection->close();
?>