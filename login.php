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
    $sql = "SELECT id, verification_code FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate verification code
        $verification_code = bin2hex(random_bytes(4)); // Generate 4-character verification code
        // Update verification code in database
        $sql = "UPDATE users SET verification_code = :verification_code WHERE id = :user_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':verification_code', $verification_code);
        $stmt->bindParam(':user_id', $user['id']);
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
            $mail->setFrom('motiurop@outlook.com', 'Motiur Rahman');
            $mail->addAddress($email);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Login Verification Code';
            $mail->Body = "Your verification code is: $verification_code";

            $mail->send();
            echo "Verification code sent to your email.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Email not found.";
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
