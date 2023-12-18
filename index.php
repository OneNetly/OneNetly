<?php include('header.php'); ?>
<?php include 'config.php'; ?>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <!-- Add enctype attribute for file uploads -->
        <form action="index.php" method="post" enctype="multipart/form-data" class="space-y-4" id="uploadForm">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" class="border p-2 rounded-md" />
            </div>

            <!-- Progress bar -->
            <div id="progressWrapper" class="hidden mt-4">
                <div id="progressBar" class="bg-blue-500 text-white p-2 rounded-md" style="width: 0;"></div>
                <div id="progressText" class="text-sm mt-2"></div>
            </div>

            <button type="submit"
                class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
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
            $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDc2RDY5NjZmMjBmYjVEOTkwNDc5MTU2OWE4OWIzNzBGQzNDN0RBYkYiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY5MjYzMjM1Mjg4MSwibmFtZSI6Ik9uZU5ldGx5In0.0PreBDH8Kv-69JsNSz6ugCKCAsJ9-682RwIU46tk30A';

            $curl = curl_init($nftStorageEndpoint);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $apiKey]);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])]);

            // Return the transfer as a string
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

            // Get response
            $response = curl_exec($curl);

            // Close cURL session
            curl_close($curl);

            $responseArray = json_decode($response, true);

            if ($responseArray && is_array($responseArray) && isset($responseArray['value'])) {
                // Save file information to your database, including CID
                $cid = $responseArray['value']['cid'];

                $stmt = $conn->prepare("INSERT INTO files (file_name, cid) VALUES (?, ?)");
                $stmt->bind_param('ss', $file['name'], $cid);
                $stmt->execute();

                // Return JSON response
                header('Content-Type: application/json');
                echo json_encode(['status' => 'success', 'cid' => $cid]);
                exit;
            } else {
                // Return JSON response
                header('Content-Type: application/json');
                echo json_encode(['status' => 'error', 'message' => 'File upload to nft.storage failed.']);
                exit;
            }
        }
    } else {
        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'File upload error.']);
        exit;
    }
}
?>
</body>

<script>
    document.getElementById("uploadForm").addEventListener("submit", function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "index.php", true);

        // Update progress bar
        xhr.upload.addEventListener("progress", function (e) {
            var percent = (e.loaded / e.total) * 100;
            document.getElementById("progressWrapper").classList.remove("hidden");
            document.getElementById("progressBar").style.width = percent + "%";
            document.getElementById("progressText").innerText = "Uploading: " + percent.toFixed(2) + "%";
        });

        // Handle successful upload
        xhr.onload = function () {
            if (xhr.status == 200) {
                // Reset progress bar
                document.getElementById("progressWrapper").classList.add("hidden");
                document.getElementById("progressBar").style.width = "0%";
                document.getElementById("progressText").innerText = "";

                // Your existing code for displaying download link
                var response = JSON.parse(xhr.responseText);
                if (response && response.status === 'success' && response.cid) {
                    // Create a link element
                    var downloadLink = "https://onenetly.com/download/" + response.cid;
                    var linkElement = document.createElement("a");
                    linkElement.href = downloadLink;
                    linkElement.textContent = "Download Link";

                    // Append the link to the container
                    var container = document.getElementById("downloadLinkContainer");
                    container.innerHTML = ""; // Clear existing content
                    container.appendChild(linkElement);
                } else {
                    console.error("File upload to nft.storage failed.");
                }
            }
        };

        // Handle errors
        xhr.onerror = function () {
            console.error("File upload error.");
        };

        xhr.send(formData);
    });

    // Function to copy to clipboard
    function copyToClipboard() {
        var copyText = document.getElementById("copyInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");

        var copyButton = document.getElementById("copyButton");
        copyButton.innerText = "Copied!";
        copyButton.style.backgroundColor = "green";
        copyButton.style.cursor = "default";

        // Reset the button text after a short delay
        setTimeout(function () {
            copyButton.innerText = "Copy";
            copyButton.style.backgroundColor = "bg-blue-500"; // Reset the original background color
            copyButton.style.cursor = "pointer";
        }, 2000);
    }
</script>

<?php include('footer.php'); ?>
