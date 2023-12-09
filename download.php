<?php include('header.php'); ?>
<?php
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];

    // Retrieve file information from the database, including the original file name
    $db = new mysqli('104.251.111.203', 'then70970925_home', 'AmiMotiur27@', 'then70970925_home');
    $stmt = $db->prepare("SELECT file_name FROM files WHERE cid = ?");
    $stmt->bind_param('s', $cid);
    $stmt->execute();
    $stmt->bind_result($fileName);

    if ($stmt->fetch()) {
        // Generate the IPFS gateway link using the CID
        $fileUrl = "https://$cid.ipfs.nftstorage.link/$fileName";
        
        echo "<div class='p-4 text-center'>";
        echo "<a href='$fileUrl' download='$fileName' class='bg-blue-500 text-white px-4 py-2 mt-8 rounded-md hover:bg-blue-600 cursor-pointer'>Download $fileName</a>";
        echo "</div>";
    } else {
        // Error handling when CID is not found in the database
        echo "<div class='p-4 text-center text-red-500'>File not found.</div>";
    }
} else {
    echo "<div class='p-4 text-center text-red-500'>Invalid request.</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>File Download</title>
    <!-- Include Tailwind CSS here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php include('footer.php'); ?>
