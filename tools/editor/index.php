<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Photo Editor - Free Web Hosting Simplified</title>
    <meta name="metaTitle" content="Photo Editor - Free Web Hosting Simplified">
    <meta name="description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://onenetly.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="OneNetly Free Photo Editor">
    <meta property="og:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta property="og:image" content="https://onenetly.com/img/og.png">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="OneNetly Free Photo Editor">
    <meta name="twitter:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="twitter:image" content="https://onenetly.com/img/favicon.png">

    <link rel="shortcut icon" type="image/jpg" href="https://onenetly.com/img/favicon.png" />
	<script src="https://cdn.tailwindcss.com"></script> 
	<script src="//unpkg.com/alpinejs" defer></script>

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
<?php include '../header.php';?>
<center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
<!-- Square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9354746037074515"
     data-ad-slot="1383400984"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script><br></center>
<div id="editor-container"></div>
<script src="dist/pixie.umd.js"></script>
<script>
  const pixie = new Pixie({
    selector: "#editor-container",
    baseUrl: 'assets',
    image: "assets/images/samples/sample1.jpg",
    ui: {
      menubar: {
        items: [
          {
            type: 'button',
            icon: [
              {
                tag: 'path',
                attr: {
                  d: 'm11.99 18.54-7.37-5.73L3 14.07l9 7 9-7-1.63-1.27zM12 16l7.36-5.73L21 9l-9-7-9 7 1.63 1.27L12 16zm0-11.47L17.74 9 12 13.47 6.26 9 12 4.53z',
                },
              },
            ],
            align: 'right',
            position: 0,
            action: editor => {
              editor.togglePanel('objects');
            },
          },
          {
            type: 'button',
            icon: [
              {
                tag: 'path',
                attr: {
                  d: 'M18 20H4V6h9V4H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-9h-2v9zm-7.79-3.17-1.96-2.36L5.5 18h11l-3.54-4.71zM20 4V1h-2v3h-3c.01.01 0 2 0 2h3v2.99c.01.01 2 0 2 0V6h3V4h-3z',
                },
              },
            ],
            align: 'left',
            buttonVariant: 'outline',
            menuItems: [
              {
                action: editor => {
                  editor.tools.import.uploadAndReplaceMainImage();
                },
                label: 'Background Image',
              },
              {
                action: editor => {
                  editor.tools.import.uploadAndAddImage();
                },
                label: 'Overlay Image',
              },
              {
                action: editor => {
                  editor.tools.import.uploadAndOpenStateFile();
                },
                label: 'Editor Project File',
              },
            ],
          },
        ],
      },
    },
  });
  window.pixie = pixie;
</script>
<center><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9354746037074515"
     crossorigin="anonymous"></script>
<!-- Square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9354746037074515"
     data-ad-slot="1383400984"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script><br></center>
<?php include '../footer.php';?>
