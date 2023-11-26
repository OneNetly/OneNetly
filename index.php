<?php include('header.php'); ?>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="index.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" class="border p-2 rounded-md" />
            </div>
            <!-- Progress bar -->
    <div id="progressWrapper" style="display: none;">
        <div id="progressBar" class="bg-blue-500" style="width: 0%; height: 20px;"></div>
        <div id="progressStatus" class="text-center mt-2"></div>
    </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
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
            $response = json_decode(curl_exec($curl), true);

            if ($response && is_array($response) && isset($response['value'])) {
                // Save file information to your database, including CID
                $cid = $response['value']['cid'];

                $db = new mysqli('localhost', 'onenetly_home', 'AmiMotiur27@', 'onenetly_home');
                $stmt = $db->prepare("INSERT INTO files (file_name, cid) VALUES (?, ?)");
                $stmt->bind_param('ss', $file['name'], $cid);
                $stmt->execute();

                // Create a unique shareable download link
                $downloadLink = "download/$cid";
                echo '<div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
                <label for="copyInput" class="block text-sm font-medium text-gray-600 mb-2">Download Link</label>
                <div class="flex items-center">
                <input id="copyInput" type="text" value ="https://onenetly.com/' . $downloadLink . '" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
                <button id="copyButton" onclick="copyToClipboard()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Copy</button>

                </div>
                </div>';
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


<script>
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
<script>
    document.getElementById('uploadForm').addEventListener('submit', function () {
        // Display the progress bar
        document.getElementById('progressWrapper').style.display = 'block';

        // Get the file input and create a FormData object
        var fileInput = document.getElementById('file');
        var formData = new FormData(this);

        // Make an AJAX request for file upload with progress
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);

        // Upload progress event listener
        xhr.upload.addEventListener('progress', function (event) {
            if (event.lengthComputable) {
                // Calculate percentage and update the progress bar
                var percentComplete = (event.loaded / event.total) * 100;
                document.getElementById('progressBar').style.width = percentComplete + '%';
                document.getElementById('progressStatus').innerText = percentComplete.toFixed(2) + '%';
            }
        });

        // Upload complete event listener
        xhr.addEventListener('load', function () {
            // Handle the response after the upload is complete
            // (You may need to update this part based on your existing logic)
            var response = JSON.parse(xhr.responseText);
            console.log(response);
        });

        // Send the FormData with the file
        xhr.send(formData);

        // Prevent the form from submitting in the traditional way
        event.preventDefault();
    });
</script>

<?php include('footer.php'); ?>