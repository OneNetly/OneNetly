<?php
session_start();
require_once("config.php");

// Check if the user is already logged in
if(isset($_SESSION["user_email"])){
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user data from the database based on the provided email
    $getUserQuery = "SELECT * FROM users WHERE email = '$email'";
    $getUserResult = $conn->query($getUserQuery);

    if ($getUserResult->num_rows > 0) {
        $row = $getUserResult->fetch_assoc();
        $storedHashedPassword = $row["password"];

        // Verify the password
        if (password_verify($password, $storedHashedPassword)) {
            $_SESSION["user_email"] = $email;

            // If "Remember Me" is checked, set a cookie
            if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "on") {
                setcookie("user_email", $email, time() + (86400 * 30), "/"); // 30 days
            }

            // Redirect to the user's dashboard or any other authenticated page
            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Invalid email or password";
        }
    } else {
        $error_message = "Invalid email or password";
    }
}
?>
<?php include_once 'header.php';?>

<body>

<div class="flex items-center justify-center h-screen">
    <div class="bg-white mt-8 p-8 rounded shadow-md w-96">
        <h2 class="text-3xl font-extrabold mb-6 text-gray-800">User Login</h2>

        <?php if (isset($error_message)) { ?>
            <p class="text-red-500 mb-4"><?php echo $error_message; ?></p>
        <?php } ?>

        <form method="post" action="" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="email" name="email" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="remember_me" id="remember_me" class="mr-2">
                <label for="remember_me" class="text-sm text-gray-600">Remember Me</label>
            </div>

            <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:border-indigo-300">Login</button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-600">Don't have an account? <a href="#" class="text-indigo-500 hover:text-indigo-600">Register</a></p>
        </div>
    </div>
</div>


<?php include_once 'footer.php';?>