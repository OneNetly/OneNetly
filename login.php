<?php
session_start();
require_once("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database based on the provided email
    $getUserQuery = "SELECT * FROM users WHERE email = '$email'";
    $getUserResult = $conn->query($getUserQuery);

    if ($getUserResult->num_rows > 0) {
        $row = $getUserResult->fetch_assoc();
        $storedHashedPassword = $row["password"];

        // Verify the password
        if (password_verify($password, $storedHashedPassword)) {
            $_SESSION["user_email"] = $email;

            // If "Remember Me" is checked, set a cookie
            if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "on") {
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
            }

            // Redirect to the user's dashboard or any other authenticated page
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    } else {
        $error_message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<body>
    <h2>User Login</h2>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="checkbox" name="remember_me"> Remember Me<br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
