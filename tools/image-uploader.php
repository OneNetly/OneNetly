<?php include './header.php'; ?>
<body class="bg-white">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="index.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" accept="image/*,.ico" class="border p-2 rounded-md" />
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
        </form>

        <div id="progress" class="mt-4"></div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['file'];

        // Check if file size is within limit (50 MB)
        if ($file['size'] > 52428800) { // 50 MB in bytes
            echo "File size exceeds the limit of 50 MB.";
            exit;
        }

        // Check if the uploaded file is an image or icon
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'ico');
        $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            echo "Only images (jpg, jpeg, png, gif) and icons (ico) are allowed.";
            exit;
        }

        // Continue with file upload if validations pass
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Use nft.storage API to upload the file to IPFS
            $nftStorageEndpoint = 'https://api.nft.storage/upload';
            $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDc2RDY5NjZmMjBmYjVEOTkwNDc5MTU2OWE4OWIzNzBGQzNDN0RBYkYiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY5MjYzMjM1Mjg4MSwibmFtZSI6Ik9uZU5ldGx5In0.0PreBDH8Kv-69JsNSz6ugCKCAsJ9-682RwIU46tk30A'; // Replace with your API key

            $curl = curl_init($nftStorageEndpoint);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $apiKey]);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, ['file' => new CURLFile($file['tmp_name'], $file['type'], $file['name'])]);

            // Get the file size for progress calculation
            $fileSize = filesize($file['tmp_name']);

            // Set up a callback function to track the upload progress
            curl_setopt($curl, CURLOPT_NOPROGRESS, false);
            curl_setopt($curl, CURLOPT_PROGRESSFUNCTION, function ($resource, $downloadSize, $downloaded, $uploadSize, $uploaded) use ($fileSize) {
                if ($uploadSize > 0) {
                    $progress = min(100, round(($uploaded / $uploadSize) * 100));

                    echo '<script>
                            document.getElementById("progress").innerText = "Upload Progress: ' . $progress . '%";
                        </script>';
                        
                }
            });

            $response = json_decode(curl_exec($curl), true);

            if ($response && is_array($response) && isset($response['value'])) {
                // Display the download link with CID
                $cid = $response['value']['cid'];
                $fileName = $file['name'];
                $downloadLink = "https://$cid.ipfs.nftstorage.link/$fileName";

                echo '<div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Download Link</label>
                        <div class="flex items-center">
                            <input type="text" value="' . $downloadLink . '" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
                            <button onclick="copyToClipboard()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">Copy</button>
                        </div>
                    </div>';
            } else {
                echo "File upload to nft.storage failed.";
            }

            curl_close($curl);
        } else {
            echo "File upload error.";
        }
    }
    ?>

    <script>
        function copyToClipboard() {
            var copyText = document.querySelector(".form-input");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            var copyButton = document.querySelector("button");
            copyButton.innerText = "Copied!";
            copyButton.style.backgroundColor = "green";
            copyButton.style.cursor = "default";
        }
    </script>
    <br>
    <?php include './footer.php'; ?>
