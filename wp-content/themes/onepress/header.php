<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="//unpkg.com/alpinejs" defer></script>
    <script type="text/javascript" src="https://fstatic.netpub.media/extra/cmp/cmp-gdpr.js" defer></script>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script type="text/javascript" src="https://fstatic.netpub.media/extra/cmp/cmp-gdpr.js" defer></script>
	<?php wp_head(); ?>
</head>

<body>
    <!-- Netpub Banner - Interstitial 0x0 -->
    <script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
    <ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="1050x300,120x600,160x600,200x200,250x250,300x250,300x50,300x600,320x100,320x50,336x280,400x350,468x60,640x480,678x60,700x300,728x500,728x90,750x400,750x480,870x200,970x250,970x90" data-sizes-mobile="1050x300,120x600,160x600,200x200,250x250,300x250,300x50,300x600,320x100,320x50,336x280,400x350,468x60,640x480,678x60,700x300,728x500,728x90,750x400,750x480,870x200,970x250,970x90" data-interstitial="1"></ins>

    <?php do_action( 'tailpress_site_before' ); ?>

<div id="page" class="min-h-screen flex flex-col">

	<?php do_action( 'tailpress_header' ); ?>

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
      <!-- For Phone -->
      <nav :class="{'flex': open, 'hidden': !open}" class="ml-0 hidden flex-auto flex-col px-5 pt-5 lg:ml-0 lg:flex lg:flex-row lg:justify-end lg:px-0 lg:pb-0 lg:pt-0">

        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="/">Home</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://ap.onenetly.com/index.php?rp=/store/free-hosting">Free Web Hosting</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://ap.onenetly.com/cart.php?a=add&domain=register">Domains</a>
        <a class="text-md focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-gray-100 p-3 text-left font-semibold hover:text-gray-900 focus:text-gray-900 focus:outline-none lg:mt-0 lg:w-auto lg:bg-transparent" href="https://forum.onenetly.com">Forum</a>
      
    </nav>
      <!-- For desktop -->
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
  
  <?php if(function_exists('newwpsafelink_top')) newwpsafelink_top();?>

	<div id="content" class="site-content flex-grow">

		<?php if ( is_front_page() ) { ?>
			<!-- Hero-->
			<div class="w-full">
    <div class="max-w-7xl mx-auto px-6 pt-16 sm:py-16 sm:pt-18 pb-10 sm:pb-18">
        <div class="flex flex-auto flex-col md:flex-row items-center">

            <!-- Left side -->
            <div class="flex-none md:flex-1">
                <div class="text-gray-900 text-4xl font-bold mb-10">Build, expand <br class="sm:hidden md:block lg:hidden"> your website
                    <br>
                    <ht class="font-bold text-purple-500"> without sweating </ht>
                </div>
                <span class="text-gray-700 text-xl font-normal md:pr-14">Free web hosting to launch your dream website! free domain, & reliable hosting. Start building for free today!</span>

                <div class="flex flex-auto max-w-sm mt-12">
                    <button class="bg-gray-900 px-5 py-2.5 rounded-lg ">
                        <div class="text-white text-md md:text-lg font-semibold text-center"><a href="https://ap.onenetly.com/index.php?rp=/store/free-hosting"> Get Started</a>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex justify-end md:flex-1">
                <img src="https://onenetly.com/img/hero.svg" alt="Hero" class="mt-14 md:mt-0 ml-5">
            </div>
        </div>

    </div>
</div>
<!-- Netpub Banner - IAB 728x90 -->
<script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
<ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="300x50,320x100,320x50,468x60,678x60" data-sizes-mobile="200x200,250x250,300x250,300x50,320x100,320x50,360x100,360x50,678x60" data-slot="1"></ins>
<!-- component -->
<div class="bg-white">
    <div class="container m-auto px-6 py-20 md:px-12 lg:px-20">
        <div class="m-auto text-center lg:w-8/12 xl:w-7/12">
            <h2 class="text-4xl text-gray-800 font-bold">Our Hosting Features</h2>
            <p class="text-gray-800 pt-4">You can get hosting for your website without paying any money. Just renew it every month to keep it active. It's easy and simple. Join us now and start your online journey for free!</p>
        </div>
        <div class="mt-12 m-auto -space-y-4 items-center justify-center md:flex md:space-y-0 md:-space-x-4 xl:w-10/12">
            <div class="relative z-10 -mx-4 group md:w-6/12 md:mx-0 lg:w-5/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-xl transition duration-500 group-hover:scale-105 lg:group-hover:scale-110"></div>
                <div class="relative p-6 space-y-6 lg:p-8">
                    <h3 class="text-3xl text-gray-700 font-semibold text-center">Free Hosting</h3>
                    <div>
                        <div class="relative flex justify-around">
                            <div class="flex items-end">
                                <span class="text-5xl text-gray-800 font-bold leading-0">FREE</span>
                                <div class="pb-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="w-max space-y-4 py-6 m-auto text-gray-600">
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>cPanel Control Panel</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>1GB SSD Disk Space</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Bandwidth</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Websites</span>
                        </li>
                    </ul>

                    <a href="https://ap.onenetly.com/index.php?rp=/store/free-hosting">
                        <button class="block w-full py-3 px-6 text-center rounded-xl transition bg-purple-500 hover:bg-blue-600">
                        <span class="text-white font-semibold">
                            Get it Now!
                        </span>
                    </button></a>
                </div>
            </div>

            <div class="relative group md:w-6/12 lg:w-7/12">
                <div aria-hidden="true" class="absolute top-0 w-full h-full rounded-2xl bg-white shadow-lg transition duration-500 group-hover:scale-105"></div>
                <div class="relative p-6 pt-16 md:p-8 md:pl-12 md:rounded-r-2xl lg:pl-20 lg:p-16">
                    <ul role="list" class="space-y-4 py-6 text-gray-600">
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Email Accounts</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Databases</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Sub Domains</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>Unlimited Parked Domains</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-purple-500 font-semibold">&check;</span>
                            <span>FREE SSL Certificates</span>
                        </li>
                    </ul>
                    <p class="text-gray-700">Team can be any size, and you can add or switch members as needed. Companies using our platform include:</p>
                    <div class="mt-6 flex justify-between gap-6">
                        <img class="w-16 lg:w-24" src="https://onenetly.com/img/partners/cpanel.png" loading="lazy" alt="cPanel">
                        <img class="w-16 lg:w-24" src="https://onenetly.com/img/partners/Imunify360.png" loading="lazy" alt="Imunify360">
                        <img class="w-16 lg:w-24" src="https://onenetly.com/img/partners/cloudlinux.png" loading="lazy" alt="Cloudlinux">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- START FEATURES-->
<div class="space-y-4 max-w-7xl mx-auto py-16 lg:py-0 lg:pt-16 px-6 lg:pb-20 lg:dark:pb-16">

    <!-- Heading -->
    <div class="lg:w-1/2 text-left lg:text-left pb-6 sm:pb-8">
        <div class="text-sm uppercase font-bold tracking-wider mb-1 text-purple-500">
            Exciting features
        </div>
        <h2 class="text-3xl md:text-4xl font-extrabold mb-2  ">
            All Plans Included
        </h2>
        <h3 class="text-lg md:text-xl md:leading-relaxed font-medium text-gray-600">
            Some of the reasons why you'll enjoy hosting with us.
        </h3>
    </div>
    <!-- END Heading -->

    <!-- Features Section: Modern Alternate With Icons -->
    <div class="bg-white">
        <div class="space-y-16 container xl:max-w-7xl mx-auto pt-4 lg:py-6">

            <!-- Features -->
            <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8 md:gap-6">
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-purple-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-purple-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-lightning-bolt inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left"> Lightning Speed
                    </h4>
                    <p class="leading-relaxed text-gray-600"> Any website's speed is crucial. We use the 9x faster LiteSpeed server than Apache for our web hosting. </p>
                </div>

                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-red-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-red-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-chart-pie inline-bloc6 w-6 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left  ">
                        Control Panel
                    </h4>
                    <p class="leading-relaxed text-gray-600   ">
                        We want to make it simple for everyone to establish a website, so we need to be able to
                        provide an expensive cPanel.
                    </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-green-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-green-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-globe inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left  ">
                        Powerful Hardware
                    </h4>

                    <p class="leading-relaxed text-gray-600   ">
                        We're using enterprise-grade hardware to give your site an extra speed boost! NVMe SSD RAID-10 is standard on all of our servers. </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-gray-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-gray-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-lightning-bolt inline6blo6k w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left"> Solid Security

                    </h4>
                    <p class="leading-relaxed text-gray-600">
                        With enterprise-grade security, Solid Security, Firewall technologies, you can safeguard your brand and audience.
                    </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-blue-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-blue-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-puzzle inline-block w68 h68">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left  ">
                        Money Guarantee
                    </h4>
                    <p class="leading-relaxed text-gray-600   ">
                        We're so confident in our web hosting service that we back it up with a 30-day money-back guarantee.
                    </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-yellow-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-yellow-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-users inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left">
                        Full Flexibility

                    </h4>
                    <p class="leading-relaxed text-gray-600">
                        With monthly contract terms, you have complete flexibility. You can change your bundle at
                        any moment to fit your needs.
                    </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-indigo-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-indigo-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-users inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left">
                        Transparency
                    </h4>
                    <p class="leading-relaxed text-gray-600">
                        Before you place an order, you will receive complete information about the goods, package,
                        and price.

                    </p>
                </div>
                <div class="group p-8 transition ease-out duration-200 bg-white   shadow-lg rounded-2xl border-gray-200">
                    <div class="text-left">
                        <div class="inline-flex items-center justify-center w-8 h-8 m-5 mb-10 relative">
                            <div class="absolute inset-0 rounded-3xl -m-5 transform rotate-3 bg-red-300 transition ease-out duration-200 group-hover:-rotate-3 group-hover:scale-105 group-hover:shadow-lg">
                            </div>
                            <div class="absolute inset-0 rounded-2xl -m-2 transform -rotate-3 bg-red-700 bg-opacity-75 shadow-inner transition ease-out duration-200 group-hover:rotate-2 group-hover:scale-105">
                            </div>
                            <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="text-white relative transform transition ease-out duration-200 group-hover:scale-110 hi-outline hi-users inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold mb-2 text-left  ">
                        SSL Certificate
                    </h4>
                    <p class="leading-relaxed text-gray-600   ">
                        A free SSL certificate is included with every site hosted by OneNetly in order to avoid any "insecure" warnings.

                    </p>
                </div>
            </div>
            <!-- END Features -->
        </div>
    </div>
    <!-- END Features Section: Modern Alternate With Icons -->
</div>
<!-- END FEATURES -->

<!-- Netpub Banner - IAB 728x500 -->
<script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
<ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="200x200,250x250,300x250,300x50,320x100,320x50,336x280,400x350,468x60,678x60,700x300,728x90" data-sizes-mobile="200x200,250x250,300x250,336x280,360x100,360x300,360x50" data-slot="5"></ins>

<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold mb-8 text-center">Frequently Asked Questions</h1>
    <div x-data="{ openQuestion: null }" class="max-w-3xl mx-auto">
      <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <div class="flex justify-between items-center cursor-pointer" @click="openQuestion === 1 ? openQuestion = null : openQuestion = 1">
          <h2 class="text-lg font-semibold">Is your hosting really free?</h2>
          <svg x-show="openQuestion !== 1" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          <svg x-show="openQuestion === 1" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </div>
        <div x-show="openQuestion === 1" class="mt-4">
          <p>Yes, you can host your website without having to pay. Ever.</p>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <div class="flex justify-between items-center cursor-pointer" @click="openQuestion === 2 ? openQuestion = null : openQuestion = 2">
          <h2 class="text-lg font-semibold">How long does it takes to setup my account?</h2>
          <svg x-show="openQuestion !== 2" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          <svg x-show="openQuestion === 2" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </div>
        <div x-show="openQuestion === 2" class="mt-4">
            <p>Forget about waiting lists, OnrNetly accounts are automatically created in minutes.</p>
          </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <div class="flex justify-between items-center cursor-pointer" @click="openQuestion === 3 ? openQuestion = null : openQuestion = 3">
          <h2 class="text-lg font-semibold">For how long is the free hosting valid?</h2>
          <svg x-show="openQuestion !== 3" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          <svg x-show="openQuestion === 3" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </div>
        <div x-show="openQuestion === 3" class="mt-4">
            <p>OneNetly is free forever! There is no time limit for free hosting. You can sign up whenever you want and use it for as long as you want! Some people have been hosting their websites with us for years, without ever paying anything! Just come to our website and renew every month.</p>
          </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <div class="flex justify-between items-center cursor-pointer" @click="openQuestion === 4 ? openQuestion = null : openQuestion = 4">
          <h2 class="text-lg font-semibold">Why do you provide free hosting?</h2>
          <svg x-show="openQuestion !== 4" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          <svg x-show="openQuestion === 4" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </div>
        <div x-show="openQuestion === 4" class="mt-4">
            <p>OneNetly provides free hosting, because we believe everyone should have the opportunity to build a presence online. Regardless of who you are, where you are and what your budget is, we believe you should be able to have a website.</p>
          </div>
      </div>

      <div class="bg-white rounded-lg shadow-md p-6 mb-4">
        <div class="flex justify-between items-center cursor-pointer" @click="openQuestion === 5 ? openQuestion = null : openQuestion = 5">
          <h2 class="text-lg font-semibold">Can I get a free subdomain?</h2>
          <svg x-show="openQuestion !== 5" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          <svg x-show="openQuestion === 5" class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
        </div>
        <div x-show="openQuestion === 5" class="mt-4">
            <p>No, We don't support subdomain.</p>
          </div>
      </div>

    </div>
  </div>
  
  <!-- Netpub Banner - IAB 750x480 -->
<script type="text/javascript">{ let s = document.createElement("script"); s.setAttribute("async", true); s.setAttribute("src", "https://fstatic.netpub.media/static/2732195bd87625475e0868faa6c05381.min.js?"+Date.now()); document.querySelector("head").appendChild(s); }</script>
<ins class="adv-2732195bd87625475e0868faa6c05381" data-sizes-desktop="200x200,250x250,300x250,300x50,320x100,320x50,336x280,400x350,468x60,678x60,700x300,728x90" data-sizes-mobile="200x200,250x250,300x250,300x50,320x100,320x50,336x280" data-slot="6"></ins>
  <?php } ?>