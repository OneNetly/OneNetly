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
        
    <div class="bg-gray-900">
  <footer class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-16 grid grid-cols-2 gap-12 pt-10 md:grid-cols-4 lg:grid-cols-6 lg:gap-8 lg:pt-12">
      <div class="col-span-full lg:col-span-2">
        <!-- logo - start -->
        <div class="mb-4 lg:-mt-2">
          <a href="/" class="inline-flex items-center gap-2 text-xl font-bold text-gray-100 md:text-2xl" aria-label="logo">
            OneNetly
          </a>
        </div>
        <!-- logo - end -->

        <p class="mb-6 text-gray-400 sm:pr-8">Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!</p>

      </div>

      <!-- nav - start -->
      <div>
        <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Products</div>

        <nav class="flex flex-col gap-4">

          <div>
            <a href="https://ap.onenetly.com/index.php?rp=/store/free-hosting" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Free Web Hosting</a>
          </div>

        </nav>
      </div>
      <!-- nav - end -->

      <!-- nav - start -->
      <div>
        <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Domain</div>

        <nav class="flex flex-col gap-4">
          <div>
            <a href="https://ap.onenetly.com/cart.php?a=add&domain=register" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Register Domain</a>
          </div>

          <div>
            <a href="https://ap.onenetly.com/cart.php?a=add&domain=transfer" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Transfer Domain</a>
          </div>

          <div>
            <a href="https://ap.onenetly.com/domain/pricing" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Domain Pricing</a>
          </div>

        </nav>
      </div>
      <!-- nav - end -->

      <!-- nav - start -->
      <div>
        <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Support</div>

        <nav class="flex flex-col gap-4">
          <div>
            <a href="https://ap.onenetly.com/index.php?rp=/announcements" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Announcements</a>
          </div>

          <div>
            <a href="https://ap.onenetly.com/index.php?rp=/knowledgebase" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Knowledgebase</a>
          </div>
          
          <div>
            <a href="https://ap.onenetly.com/serverstatus.php" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600"> Network Status</a>
          </div>

          <div>
            <a href="https://ap.onenetly.com/submitticket.php?step=2&deptid=1" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Submit Ticket</a>
          </div>

          <div>
            <a href="https://ap.onenetly.com/contact.php" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Contact Us</a>
          </div>

        </nav>
      </div>
      <!-- nav - end -->

      <!-- nav - start -->
      <div>
        <div class="mb-4 font-bold uppercase tracking-widest text-gray-100">Legal</div>

        <nav class="flex flex-col gap-4">
          <div>
            <a href="tos.html" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Terms of Service</a>
          </div>

          <div>
            <a href="privacy-policy.html" class="text-gray-400 transition duration-100 hover:text-indigo-500 active:text-indigo-600">Privacy Policy</a>
          </div>
        </nav>
      </div>
      <!-- nav - end -->
    </div>

    <div class="border-t border-gray-800 py-8 text-center text-sm text-gray-400">Copyright © 2024 OneNetly, LLC. All Rights Reserved.</div>
  </footer>
</div>

</div>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-54W25R1NPQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-54W25R1NPQ');
</script>

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
                    this.file = e.target.files[0];
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
</body>

</html>
