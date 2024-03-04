<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    $email = $_POST['email'];
    $verification_code = $_POST['verification_code'];

    // Check if verification code is correct
    $sql = "SELECT id FROM users WHERE email = :email AND verification_code = :verification_code";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':verification_code', $verification_code);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Clear verification code in database
        $sql = "UPDATE users SET verification_code = NULL, is_verified = 1 WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $user['id']);
        $stmt->execute();

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['logged_in'] = true;

        // Extend session expiration time to 7 days (adjust as needed)
        $_SESSION['expire'] = time() + (7 * 24 * 3600);

        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid verification code.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>
<body>
    <form method="post" action="">
        Verification Code: <input type="text" name="verification_code" required><br>
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <input type="submit" value="Verify">
    </form>
</body>
</html>
