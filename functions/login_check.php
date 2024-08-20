<?php
session_start();
include ('../config/dbconfig.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Fetch user from database
    $login_query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($con, $login_query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];  // Set user ID or any other identifier
            $_SESSION['message'] = 'Login successful!';
            header('Location: ../admin_pages/index.php');  // Redirect to a protected page
            exit();
        } else {
            $_SESSION['message'] = 'Invalid password.';
        }
    } else {
        $_SESSION['message'] = 'No user found with that email.';
    }

    header('Location: /user_login.php');
    exit();
}
?>
