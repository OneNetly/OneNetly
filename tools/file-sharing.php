<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>File Sharing - Free Web Hosting Simplified</title>
    <meta name="metaTitle" content="File Sharing - Free Web Hosting Simplified">
    <meta name="description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://onenetly.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="OneNetly Free File Sharing">
    <meta property="og:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta property="og:image" content="https://onenetly.com/img/og.png">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="OneNetly Free File Sharing">
    <meta name="twitter:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="twitter:image" content="https://onenetly.com/img/favicon.png">

    <link rel="shortcut icon" type="image/jpg" href="https://onenetly.com/img/favicon.png" />
	<script src="https://cdn.tailwindcss.com"></script> 
	<script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-54W25R1NPQ"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-54W25R1NPQ');
    </script>
    <!-- End Google tag (gtag.js) -->
</head>

<?php include './header.php';?>
    <style>
        .progress-container {
    position: relative;
    width: 100%;
    height: 24px; /* Adjust height as needed */
    background-color: #f3f3f3;
    border-radius: 4px;
    overflow: hidden;
}

.progress-bar {
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    background-color: #4caf50; /* Change color as needed */
    transition: width 0.3s ease;
}

.progress-text {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff; /* Change color as needed */
    font-weight: bold;
}

    </style>
</head>

<body class="bg-white">
    <div id="app" class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold mb-4">File Upload</h1>

        <form @submit.prevent="uploadFile" enctype="multipart/form-data" class="space-y-4">
            <div class="flex flex-col">
                <label for="file" class="mb-2">Choose a file to upload:</label>
                <input type="file" ref="fileInput" @change="onFileChange" class="border p-2 rounded-md" />
            </div>
            <button type="submit" :disabled="!file" class="bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600 transition duration-300">Upload</button>
        </form>

        <div v-if="progress !== null" class="mt-4">
            <div class="progress-container">
                <div class="progress-bar" :style="{ width: progress + '%' }"></div>
                <div class="progress-text">{{ progress }}%</div>
            </div>
        </div>        

        <div v-if="downloadLink" class="max-w-3xl mx-auto p-6 bg-white mt-8 rounded-lg shadow-lg">
            <label class="block text-sm font-medium text-gray-600 mb-2">Download Link</label>
            <div class="flex items-center">
                <input type="text" :value="downloadLink" ref="downloadLinkInput" readonly class="form-input flex-1 mr-2 py-2 px-4 rounded-md border border-gray-300 focus:ring focus:border-blue-300">
                <button @click="copyToClipboard" :class="{ 'bg-blue-500': !linkCopied, 'bg-green-500': linkCopied }" 
                        :disabled="linkCopied" 
                        class="text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300 transition duration-300">
                    {{ linkCopied ? 'Copied' : 'Copy' }}
                </button>
            </div>
        </div>
        </div>
        
    <br>
    <?php include './footer.php';?>
<script>
        new Vue({
            el: '#app',
            data: {
                file: null,
                progress: null,
                downloadLink: null,
                linkCopied: false // Add this line
            },
            methods: {
                onFileChange(e) {
                    const selectedFile = e.target.files[0];
                    const maxSize = 50 * 1024 * 1024; // 50 MB in bytes
                    if (selectedFile.size > maxSize) {
                        // Reset file input and notify the user
                        this.$refs.fileInput.value = '';
                        alert('File size exceeds the limit of 50 MB.');
                    } else {
                        this.file = selectedFile;
                    }
                },

                uploadFile() {
                    let formData = new FormData();
                    formData.append('file', this.file);

                    let xhr = new XMLHttpRequest();
                    xhr.open('POST', 'https://api.nft.storage/upload');

                    xhr.upload.addEventListener('progress', (event) => {
                        if (event.lengthComputable) {
                            this.progress = Math.round((event.loaded / event.total) * 100);
                        }
                    });

                    xhr.onload = () => {
                        if (xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);
                            if (response && response.value && response.value.cid) {
                                let cid = response.value.cid;
                                let fileName = this.file.name;
                                this.downloadLink = `https://${cid}.ipfs.nftstorage.link/${fileName}`;
                            }
                        } else {
                            console.error('File upload failed.');
                        }
                    };

                    xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJkaWQ6ZXRocjoweDc2RDY5NjZmMjBmYjVEOTkwNDc5MTU2OWE4OWIzNzBGQzNDN0RBYkYiLCJpc3MiOiJuZnQtc3RvcmFnZSIsImlhdCI6MTY5MjYzMjM1Mjg4MSwibmFtZSI6Ik9uZU5ldGx5In0.0PreBDH8Kv-69JsNSz6ugCKCAsJ9-682RwIU46tk30A');
                    xhr.send(formData);
                },
                copyToClipboard() {
                    let textField = this.$refs.downloadLinkInput;
                    textField.select();
                    document.execCommand('copy');
                    this.linkCopied = true; // Set linkCopied to true after copying
                    setTimeout(() => {
                        this.linkCopied = false; // Reset linkCopied to false after 3 seconds
                    }, 3000); // 3000 milliseconds = 3 seconds
                }

            }
        });
    </script>
