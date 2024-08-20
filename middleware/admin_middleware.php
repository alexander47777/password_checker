<?php
include('../functions/login_check.php');

if (isset($_SESSION['user_id'])) {
    if ($user['role_us'] == 0){
        $_SESSION['message'] = 'You are not authorized to access this page.';
        header('Location: /main.php'); 
    }


} else {
    $_SESSION['message'] = 'Login to continue.';
    header('Location: ../admin_pages/index.php');  // Redirect to a protected page

}
