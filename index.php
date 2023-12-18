<?php include('header.php'); ?>
<?php include 'config.php'; ?>
<body class="bg-gray-100">
    <div class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form action="upload.php" method="post" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" name="file" id="file" class="border p-2 rounded-md" />
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
        </form>
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

        // Reset the button text after a short delay
        setTimeout(function () {
            copyButton.innerText = "Copy";
            copyButton.style.backgroundColor = "bg-blue-500"; // Reset the original background color
            copyButton.style.cursor = "pointer";
        }, 2000);
    }
</script>

<?php include('footer.php'); ?>