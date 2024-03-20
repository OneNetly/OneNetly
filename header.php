
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>OneNetly - Free Web Hosting Simplified</title>
    <meta name="metaTitle" content="OneNetly - Free Web Hosting Simplified">
    <meta name="description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://onenetly.com">
    <meta property="og:type" content="website">
    <meta property="og:title" content="OneNetly Free Hosting">
    <meta property="og:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta property="og:image" content="https://onenetly.com/img/og.png">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@OneNetly">
    <meta name="twitter:title" content="OneNetly Free Hosting">
    <meta name="twitter:description" content="Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!">
    <meta name="twitter:image" content="https://onenetly.com/img/favicon.png">
    
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.png" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>

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

<body>
  <div class="sticky top-0 z-50 w-full border-b border-transparent bg-white text-gray-700 shadow max-lg:max-h-screen max-lg:overflow-y-auto">
    <div x-data="{ open: false }"
      class="mx-auto flex max-w-screen-xl flex-col px-2 py-2 lg:flex-row lg:items-center lg:justify-between">
      <div class="flex flex-row items-center justify-between p-4">
        <a href="/"> <img class="h-auto w-48" src="/img/logo.png" alt="Logo" /> </a>
        <button class="focus:shadow-outline rounded-lg focus:outline-none lg:hidden" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" style="display: none;"></path>
          </svg>
        </button>
      </div>

      <nav :class="{'flex': open, 'hidden': !open}" class="ml-0 hidden flex-auto flex-col px-5 pt-5 lg:ml-0 lg:flex lg:flex-row lg:justify-end lg:px-0 lg:pb-0 lg:pt-0">

        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="./index.php">Home</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://ap.onenetly.com/index.php?rp=/store/free-hosting">Free Web Hosting</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://ap.onenetly.com/cart.php?a=add&domain=register">Domains</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://forum.onenetly.com">Forum</a>

      </nav>

      <nav :class="{'flex': open, 'hidden': !open}" class="mt-6 hidden flex-auto items-center justify-between px-5 pb-10 sm:flex-row sm:items-center lg:mt-0 lg:flex lg:flex-row lg:justify-end lg:px-0 lg:pb-0 lg:pt-0">
        <div class="md:p-4">
          <a class="text-md focus:shadow-outline ml-2 flex items-center rounded-lg bg-gray-100 px-4 py-2 font-semibold sm:ml-0 md:ml-2 md:mt-0" href="https://ap.onenetly.com/clientarea.php" target="_blank">
            <span class="">Account</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </nav>
      
    </div>
  </div>

  <script type='text/javascript' src='//pl17264611.profitablegatecpm.com/d2/70/61/d27061a80f5b3832b97510f507c12507.js'></script>

  <center><br><script type="text/javascript">
	atOptions = {
		'key' : '5c5b84f70ab47f3008ca2d0fdf9fb7d6',
		'format' : 'iframe',
		'height' : 60,
		'width' : 468,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="//www.topcreativeformat.com/5c5b84f70ab47f3008ca2d0fdf9fb7d6/invoke.js"></scr' + 'ipt>');
</script><br></center>