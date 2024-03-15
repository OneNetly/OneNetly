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