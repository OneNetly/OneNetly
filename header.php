<?php
// Check if a session is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is already logged in
if(isset($_SESSION["user_email"])){
    $dashboardLink = '<a href="/dashboard.php">Dashboard</a>';
} else {
    $dashboardLink = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneNetly</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>
<body>
<header class="bg-white">
        <nav class="flex justify-between items-center w-[92%]  mx-auto">
            <div>
                <a href="/"><img class="w-16 cursor-pointer" src="https://cdn-icons-png.flaticon.com/512/5968/5968204.png" alt="..."></a>
            </div>
            <div class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-gray-500" href="#">Products</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Solution</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Resource</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Developers</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-3">
                <?php echo $dashboardLink; ?>
                <?php if(isset($_SESSION["user_email"])) { ?>
                    <!-- Add logout button or other user-specific actions here -->
                    <a href="/logout.php"><button class="bg-gray-600 text-white px-5 py-2 rounded-full">Logout</button></a>
                <?php } else { ?>
                    <a href="/login.php"><button class="bg-gray-600 text-white px-5 py-2 rounded-full">Login</button></a>
                    <a href="/register.php"><button class="bg-gray-600 text-white px-5 py-2 rounded-full">Register</button></a>
                <?php } ?>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    </header>

    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>