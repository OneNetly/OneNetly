<?php
include_once('./config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $hashtags = $_POST['hashtags'];

    $stmt = $conn->prepare("INSERT INTO articles (title, content, hashtags) VALUES (:title, :content, :hashtags)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':hashtags', $hashtags);
    $stmt->execute();

    header('Location: index.php');
    exit;
}
?>
