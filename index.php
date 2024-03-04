<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Share Button</title>
<style>
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.share-buttons {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.share-button {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.share-button:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>
<div class="share-buttons">
  <button class="share-button facebook">Facebook</button>
  <button class="share-button twitter">Twitter</button>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const shareButtons = document.querySelectorAll(".share-button");

  shareButtons.forEach(button => {
    button.addEventListener("click", function() {
      const pageTitle = document.title;
      const pageUrl = window.location.href;

      if (button.classList.contains("facebook")) {
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(pageUrl)}&t=${encodeURIComponent(pageTitle)}`, "_blank");
      } else if (button.classList.contains("twitter")) {
        window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(pageUrl)}&text=${encodeURIComponent(pageTitle)}`, "_blank");
      }
    });
  });
});
</script>
</body>
</html>
