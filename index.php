<?php include('header.php'); ?>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="index.php" class="dropzone" id="my-awesome-dropzone">
        </form>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['file'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            // Validate file type and size (100 MB limit)
            $allowedFileTypes = array('jpg', 'jpeg', 'png', 'pdf', 'zip', 'rar'); // Add allowed file types
            $maxFileSize = 100 * 1024 * 1024; // 100 MB (in bytes)

            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedFileTypes) || $file['size'] > $maxFileSize) {
                echo "Invalid file type or size. Maximum file size allowed is 100 MB.";
            } else {
                // Use nft.storage API to upload the file to IPFS
                $nftStorageEndpoint = 'https://api.nft.storage/upload';
                $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDc2RDY5NjZmMjBmYjVEOTkwNDc5MTU2OWE4OWIzNzBGQzNDN0RBYkYiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY5MjYzMjM1Mjg4MSwibmFtZSI6Ik9uZU5ldGx5In0.0PreBDH8Kv-69JsNSz6ugCKCAsJ9-682RwIU46tk30A'; // Replace with your actual API key

                $curl = curl_init($nftStorageEndpoint);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $apiKey]);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])]);
                $response = json_decode(curl_exec($curl), true);

                if ($response && is_array($response) && isset($response['value'])) {
                    // Save file information to your database, including CID
                    $cid = $response['value']['cid'];

                    $db = new mysqli('104.251.111.203', 'then70970925_home', 'AmiMotiur27@', 'then70970925_home');
                    $stmt = $db->prepare("INSERT INTO files (file_name, cid) VALUES (?, ?)");
                    $stmt->bind_param('ss', $file['name'], $cid);
                    $stmt->execute();

                    // Call the JavaScript function to update the download link
                    echo '<script>updateDownloadLink("' . $file['name'] . '");</script>';
                } else {
                    echo "File upload to nft.storage failed.";
                }

                curl_close($curl);
            }
        } else {
            echo "File upload error.";
        }
    }
    ?>

    <div id="success-message" style="display: none;">File uploaded successfully!</div>
    <div id="download-link" style="display: none;">
        <label for="copyInput" class="block text-sm font-medium text-gray-600 mb-2">Download Link</label>
        <div class="flex items-center">
            <input id="copyInput" type="text" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
            <button id="copyButton" onclick="copyToClipboard()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Copy</button>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            // ... (your existing copyToClipboard function)

            // Reset the button text after a short delay
            setTimeout(function () {
                copyButton.innerText = "Copy";
                copyButton.style.backgroundColor = "bg-blue-500"; // Reset the original background color
                copyButton.style.cursor = "pointer";
            }, 2000);
        }

        // Add this function to update the link dynamically after the upload is complete
        function updateDownloadLink(fileName) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var downloadLink = xhr.responseText;
                    var copyInput = document.getElementById("copyInput");
                    copyInput.value = downloadLink;

                    // Show success message
                    $("#success-message").show();

                    // Show download link
                    $("#download-link").show();
                }
            };
            xhr.open("GET", "get_link.php?file_name=" + fileName, true);
            xhr.send();
        }
    </script>

    <?php include('footer.php'); ?>
</body>
</html>
