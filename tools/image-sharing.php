<?php include('header.php'); ?>
<?php include 'config.php'; ?>
<body class="bg-white">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="index.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" class="border p-2 rounded-md" />
            </div>
            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
        </form>

        <div id="progress" class="mt-4"></div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['file'];

        if ($file['error'] === UPLOAD_ERR_OK) {
            // Validate file type and size (1 GB limit)
            $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp', 'ico', 'mp3', 'wav', 'ogg', 'mp4', 'mov', 'avi', 'wmv', 'flv', 'mkv', 'pdf', 'zip', 'rar', 'iso'); // Add allowed file types
            $maxFileSize = 1 * 1024 * 1024 * 1024; // 1 GB (in bytes)

            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedFileTypes) || $file['size'] > $maxFileSize) {
                echo "Invalid file type or size. Maximum file size allowed is 1 GB.";
            } else {
                // Use nft.storage API to upload the file to IPFS
                $nftStorageEndpoint = 'https://api.nft.storage/upload';
                $apiKey = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDc2RDY5NjZmMjBmYjVEOTkwNDc5MTU2OWE4OWIzNzBGQzNDN0RBYkYiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY5MjYzMjM1Mjg4MSwibmFtZSI6Ik9uZU5ldGx5In0.0PreBDH8Kv-69JsNSz6ugCKCAsJ9-682RwIU46tk30A';

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
                    <input id="copyInput" type="text" value ="https://freenetly.com/' . $downloadLink . '" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
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
    <center><br><script type="text/javascript">
	atOptions = {
		'key' : 'a11750efb3e84a4d556c5f84f5354363',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/a11750efb3e84a4d556c5f84f5354363/invoke.js"></scr' + 'ipt>');
</script></center>
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <!-- text - start -->
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">Frequently asked questions</h2>

     </div>
    <!-- text - end -->

    <div class="grid gap-8 sm:grid-cols-2 sm:gap-y-10 xl:grid-cols-3">
      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">Is this service completly free?</h3>
        <p class="text-gray-500">Yes, absolutely free!</p>
      </div>
      <!-- question - end -->

      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">What file formats can I upload?</h3>
        <p class="text-gray-500">All formats are allowed.</p>
      </div>
      <!-- question - end -->

      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">How do I upload a file?</h3>
        <p class="text-gray-500">Click "Choose file" button. Now select the file you want to upload and click the "Upload" button.After the loading process you will see a link. With this link you can access your file or picture at any time.</p>
      </div>
      <!-- question - end -->

      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">Can I upload multiple files at once?</h3>
        <p class="text-gray-500">Yes! After clicking on the "Choose file" button, you can select multiple files with the mouse. (Only possible with modern browsers.)</p>
      </div>
      <!-- question - end -->

      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">Which file sizes can be uploaded</h3>
        <p class="text-gray-500">A file can not be larger than 1 gigabyte.</p>
      </div>
      <!-- question - end -->

      <!-- question - start -->
      <div class="relative rounded-lg bg-gray-100 p-5 pt-8">
        <span class="absolute -top-4 left-4 inline-flex h-8 w-8 items-center justify-center rounded-full bg-indigo-500 text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
          </svg>
        </span>

        <h3 class="mb-3 text-lg font-semibold text-indigo-500 md:text-xl">Will my files automatically deleted?</h3>
        <p class="text-gray-500">No, all files stored for lifetime. </p>
      </div>
      <!-- question - end -->
    </div>
  </div>
</div>
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
        }
    </script>
    <?php include('footer.php'); ?>