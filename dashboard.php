<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}

// Include the database connection file
require_once("config.php");

// Retrieve user information from the session
$userEmail = $_SESSION["user_email"];

// Retrieve additional user details from the database
$getUserQuery = "SELECT * FROM users WHERE email = '$userEmail'";
$getUserResult = $conn->query($getUserQuery);

if ($getUserResult->num_rows > 0) {
    $row = $getUserResult->fetch_assoc();
    $firstName = $row["first_name"];
    $lastName = $row["last_name"];
} else {
    // Handle the case where user information is not found
    $firstName = "N/A";
    $lastName = "N/A";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome to Your Dashboard, <?php echo $firstName . " " . $lastName; ?>!</h2>
    <p>Email: <?php echo $userEmail; ?></p>
    <p>Other Dashboard Content Goes Here...</p>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>
