<?php
require 'config.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = htmlspecialchars($_POST['username']);
  $password = password_hash($POST['password'], PASSWORD_DEFAULT);
  try {
    $stmt = $con->prepare("INSERT INTO users (username, password) VALUES (:username, :password");
    $stmt->bindParm(':username', $username);
    $stmt->bindParm(':password', $password);
    $stmt->execute();
    
    //Redirect to Dashboard
    header("Location: dashboard.php");
    exit();
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
$conn = null;
?>