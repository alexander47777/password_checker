<?php

session_start();
include ('../config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_pass = mysqli_real_escape_string($con, $_POST['confirm-password']);

    // Checking if email is already registered
    $check_email = "SELECT email FROM users WHERE email='$email'";
    $check_email_run = mysqli_query($con, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $_SESSION['message'] = 'EMAIL ALREADY EXITS.';
        header('Location: /register.php');
        exit();
    } else {
        if ($password == $confirm_pass) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$hashed_password')";
            error_log("Executing query: $insert_query");
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                $_SESSION['message'] = 'Registered user!';
                header('Location: /user_login.php');
                exit();
            } else {
                $_SESSION['message'] = 'Registration failed: ' . mysqli_error($con);
                header('Location: ../admin_pages/sign_up.php');
                exit();
            }
        } else {
            $_SESSION['message'] = 'Passwords do not match';
            header('Location: ../admin_pages/sign_up.php');
        }
    }
}
