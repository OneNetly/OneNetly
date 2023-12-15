<?php
$host = "104.251.111.203";
$username = "then70970925_home";
$password = "AmiMotiur27@";
$database = "then70970925_home";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
