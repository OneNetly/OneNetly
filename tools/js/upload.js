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