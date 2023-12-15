<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the remember me cookie (if set)
if (isset($_COOKIE["user_email"])) {
    setcookie("user_email", "", time() - 3600, "/");
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
