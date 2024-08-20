<?php

$server_name = "";
$username = "";
$password = "";
$db_name = "";

// Creating connection
$con = mysqli_connect($server_name, $username, $password, $db_name);

if (!$con) {
    error_log("Failed to connect to the database: " . mysqli_connect_error());
    echo "An error occurred. Please try again later.";
    exit();
}
