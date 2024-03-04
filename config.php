<?php
// Database connection parameters
$host = '104.251.111.203'; // MySQL server hostname
$dbname = 'free91057380_home'; // Database name
$username = 'free91057380_home'; // MySQL username
$password = 'AmiMotiur27@'; // MySQL password

// PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display error message
    die("Connection failed: " . $e->getMessage());
}
?>
