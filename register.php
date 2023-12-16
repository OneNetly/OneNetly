<?php
require_once("config.php");

// Check if the user is already logged in
if(isset($_SESSION["user_email"])){
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["first_name"];
    $lastName = $_POST["last_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Check if the email is already registered
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $checkEmailResult = $conn->query($checkEmailQuery);

    if ($checkEmailResult->num_rows > 0) {
        $error_message = "Email is already registered. Please choose a different email.";
    } else {
        // Insert the user data into the database
        $insertUserQuery = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";

        if ($conn->query($insertUserQuery) === TRUE) {
            // Registration successful, set user session and redirect to dashboard
            session_start();
            $_SESSION["user_email"] = $email;

            header("Location: dashboard.php");
            exit();
        } else {
            $error_message = "Error registering the user: " . $conn->error;
        }
    }
}

?>
<?php include_once 'header.php';?>

<div class="flex items-center justify-center h-screen">
    <div class="bg-white mt-11 p-8 rounded shadow-md w-96">
        <h2 class="text-3xl font-extrabold mb-6 text-gray-800">User Registration</h2>

        <?php if (isset($error_message)) { ?>
            <p class="text-red-500 mb-4"><?php echo $error_message; ?></p>
        <?php } ?>

        <form method="post" action="" class="space-y-4">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-600">First Name:</label>
                <input type="text" name="first_name" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-600">Last Name:</label>
                <input type="text" name="last_name" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                <input type="email" name="email" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                <input type="password" name="password" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-600">Confirm Password:</label>
                <input type="password" name="confirm_password" required class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500">
            </div>

            <button type="submit" class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring focus:border-indigo-300">Register</button>
        </form>
    </div>
</div>


    <?php include_once 'footer.php';?>
