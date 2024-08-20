<?php

$server_name = "localhost";
$username = "root";
$password = "new_password";
$db_name = "test";

// Creating connection
$con = mysqli_connect($server_name, $username, $password, $db_name);

if (!$con) {
    error_log("Failed to connect to the database: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
    exit();
}