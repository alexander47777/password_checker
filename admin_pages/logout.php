<?php

session_start();

if (isset($_SESSION['user_id'])) {
    // Unset the user_id session variable
    unset($_SESSION['user_id']);

    // Optionally, you can destroy the entire session if you want to remove all session data
    session_destroy();

    // Set a message to confirm the user has logged out
    $_SESSION['message'] = "Logged out successfully.";
}

// Redirect to the main page or login page
header('Location: /main.php');
exit();

?>
