<?php
require_once 'config.php';
require_once 'vendor/autoload.php'; // Include PHPMailer autoload.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed.");
    }

    $email = $_POST['email'];

    // Check if email exists
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // If email does not exist, add user to database
        $sql = "INSERT INTO users (email) VALUES (:email)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    }

    // Generate verification code
    $verification_code = bin2hex(random_bytes(4)); // Generate 4-character verification code
    // Update verification code in database
    $sql = "UPDATE users SET verification_code = :verification_code WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':verification_code', $verification_code);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Send verification code to user via email
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'onenetly@gmail.com'; // Your SMTP username
        $mail->Password = 'rhwf ufqk rvtc zgvl'; // Your SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('your_email@gmail.com', 'Your Name');
        $mail->addAddress($email); // No recipient needed

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Login Verification Code';
        $mail->Body = "Your verification code is: $verification_code";

        $mail->send();

        // Redirect to verify.php with email as parameter
        header("Location: verify.php?email=$email");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="">
        Email: <input type="email" name="email" required><br>
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        <input type="submit" value="Get Verification Code">
    </form>
</body>
</html>
