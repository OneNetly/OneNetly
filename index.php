<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold my-4">Blog Articles</h1>
        <div class="grid grid-cols-3 gap-4">
            <?php
            include_once('./config.php');

            $stmt = $conn->query("SELECT * FROM articles");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="bg-white rounded-lg shadow-md p-4">';
                echo '<h2 class="text-xl font-bold">' . $row['title'] . '</h2>';
                echo '<p>' . $row['content'] . '</p>';
                echo '<p class="text-gray-500">#' . $row['hashtags'] . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
