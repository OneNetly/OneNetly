<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Share Buttons</title>
</head>
<body>

<!-- HTML structure for the share buttons -->
<div id="shareButtons" style="display: flex; justify-content: space-around; gap: 10px;">
  <button class="share-button" onclick="shareToFacebook()">Facebook</button>
  <button class="share-button" onclick="shareToTwitter()">Twitter</button>
  <button class="share-button" onclick="toggleOverlay()">More</button>
</div>

<!-- Overlay for more buttons -->
<div id="overlay" style="display: none; position: fixed; z-index: 1000; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
  <div style="background-color: #fff; padding: 20px; border-radius: 10px;">
    <button class="share-button" onclick="shareToPinterest()">Pinterest</button>
    <button class="share-button" onclick="shareToWhatsapp()">WhatsApp</button>
    <button class="share-button" onclick="shareToSms()">SMS</button>
    <button class="share-button" onclick="shareToTumblr()">Tumblr</button>
    <p style="margin-top: 10px; text-align: center;">Powered by <a href="https://www.onenetlink.com" target="_blank">OneNetlink</a></p>
  </div>
</div>

<!-- JavaScript code for toggling overlay and sharing functionality -->
<script>
function toggleOverlay() {
  var overlay = document.getElementById("overlay");
  overlay.style.display = (overlay.style.display === "none" || overlay.style.display === "") ? "flex" : "none";
}

function shareToFacebook() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(pageUrl)}&t=${encodeURIComponent(pageTitle)}`, "_blank");
}

function shareToTwitter() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`https://twitter.com/intent/tweet?url=${encodeURIComponent(pageUrl)}&text=${encodeURIComponent(pageTitle)}`, "_blank");
}

function shareToPinterest() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`https://pinterest.com/pin/create/button/?url=${encodeURIComponent(pageUrl)}&media=&description=${encodeURIComponent(pageTitle)}`, "_blank");
}

function shareToWhatsapp() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`https://wa.me/?text=${encodeURIComponent(pageTitle + ' ' + pageUrl)}`, "_blank");
}

function shareToSms() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`sms:?&body=${encodeURIComponent(pageTitle + ' ' + pageUrl)}`, "_blank");
}

function shareToTumblr() {
  const pageTitle = document.title;
  const pageUrl = window.location.href;
  window.open(`https://www.tumblr.com/widgets/share/tool?canonicalUrl=${encodeURIComponent(pageUrl)}&title=${encodeURIComponent(pageTitle)}`, "_blank");
}
</script>

</body>
</html>