<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneNetly</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
<!-- Header -->
<header x-data="{ open: false, showLogin: false }" class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">

            <!-- Logo -->
            <div class="text-2xl font-semibold">
                <a href="#">Your Logo</a>
            </div>

            <!-- Navigation Menu -->
            <nav class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-800 hover:text-gray-600">Home</a>
                <a href="#" class="text-gray-800 hover:text-gray-600">About</a>
                <a href="#" class="text-gray-800 hover:text-gray-600">Services</a>
                <a href="#" class="text-gray-800 hover:text-gray-600">Contact</a>
            </nav>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button @click="open = !open" class="text-gray-800 hover:text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div x-show="open" @click.away="open = false"
                class="md:hidden fixed top-0 left-0 w-full h-full bg-white bg-opacity-95 z-50">
                <div class="flex justify-end p-4">
                    <button @click="open = false" class="text-gray-800 hover:text-gray-600 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col items-center space-y-4">
                    <a href="#" class="text-gray-800 hover:text-gray-600">Home</a>
                    <a href="#" class="text-gray-800 hover:text-gray-600">About</a>
                    <a href="#" class="text-gray-800 hover:text-gray-600">Services</a>
                    <a href="#" class="text-gray-800 hover:text-gray-600">Contact</a>

                    <!-- Mobile Login and Register Section -->
                    <div x-show="showLogin" class="flex flex-col items-center space-y-4 mt-4">
                        <a href="#" class="text-gray-800 hover:text-gray-600">Login</a>
                        <a href="#" class="text-gray-800 hover:text-gray-600">Register</a>
                    </div>
                </div>

                <!-- Mobile Login and Register Buttons -->
                <div class="flex items-center space-x-4 mt-4">
                    <button @click="showLogin = !showLogin"
                        class="text-gray-800 hover:text-gray-600 focus:outline-none">
                        {{ showLogin ? 'Close' : 'Login/Register' }}
                    </button>
                </div>
            </div>

            <!-- Login and Register Buttons (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="#" class="text-gray-800 hover:text-gray-600">Login</a>
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600">Register</a>
            </div>

        </div>
    </header>
