<?php
$host = "104.251.111.203";
$username = "then70970925_home";
$password = "AmiMotiur27@";
$database = "then70970925_home";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Optionally set character set to UTF-8
    $conn->exec("SET NAMES utf8");
} catch(PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
?>

