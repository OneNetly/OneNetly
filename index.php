<?php include('header.php'); ?>
<?php include 'config.php'; ?>

<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="index.php" method="post" enctype="multipart/form-data" class="space-y-4" id="uploadForm">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" class="border p-2 rounded-md" />
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>

            <!-- Progress Bar Section -->
            <div id="progress-container" class="hidden">
                <div class="row">
                    <label>File Name:</label>
                    <div id="file-name"></div>
                </div>
                <div class="row">
                    <div id="progress-bar"></div>
                </div>
            </div>
        </form>
    </div>

    <?php
include('header.php');
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file = $_FILES['file'];

    if ($file['error'] === UPLOAD_ERR_OK) {
        // Validate file type and size (100 MB limit)
        $allowedFileTypes = array('jpg', 'jpeg', 'png', 'pdf', 'zip', 'rar');
        $maxFileSize = 100 * 1024 * 1024;

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

                $stmt = $conn->prepare("INSERT INTO files (file_name, cid) VALUES (?, ?)");
                $stmt->bind_param('ss', $file['name'], $cid);
                $stmt->execute();

                // Create a unique shareable download link
                $downloadLink = "download/$cid";
                echo '<div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
                    <label for="copyInput" class="block text-sm font-medium text-gray-600 mb-2">Download Link</label>
                    <div class="flex items-center">
                        <input id="copyInput" type="text" value="https://onenetly.com/' . $downloadLink . '" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
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

include('footer.php');
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


    <?php include('footer.php'); ?>

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#uploadForm').submit(function(e) {
                if ($('#file').val()) {
                    e.preventDefault();
                    $('#progress-container').removeClass('hidden');
                    $(this).ajaxSubmit({
                        beforeSubmit: function() {
                            $("#progress-bar").width('0%');
                            $("#file-name").html('');
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                            $("#progress-bar").width(percentComplete + '%');
                            $("#progress-bar").html('<div id="progress-status" class="text-center">' + percentComplete + ' %</div>');
                            $("#file-name").html('<p>Uploading: ' + $('#file').val() + '</p>');
                        },
                        success: function() {
                            // Handle success if needed
                        },
                        resetForm: true
                    });
                    return false;
                }
            });
        });
    </script>
</body>
</html>
