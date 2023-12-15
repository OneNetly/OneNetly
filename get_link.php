<?php
// Retrieve the CID from the database based on the file name
if (isset($_GET['file_name'])) {
    $db = new mysqli('104.251.111.203', 'then70970925_home', 'AmiMotiur27@', 'then70970925_home');
    $stmt = $db->prepare("SELECT cid FROM files WHERE file_name = ?");
    $stmt->bind_param('s', $_GET['file_name']);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        $cid = $row['cid'];
        $downloadLink = "https://onenetly.com/download/$cid";
        echo $downloadLink;
    } else {
        echo "Link not found";
    }
} else {
    echo "Invalid request";
}
?>
