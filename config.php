<?php

// Database configuration
define('DB_HOST', '104.251.111.203');
define('DB_NAME', 'then70970925_home');
define('DB_USER', 'then70970925_home');
define('DB_PASSWORD', 'AmiMotiur27@');
define('DB_CHARSET', 'utf8mb4');

// PDO database connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
  
?>
