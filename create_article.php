<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold my-4">Create New Article</h1>
        <form action="submit_article.php" method="POST">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold">Title</label>
                <input type="text" id="title" name="title" class="form-input mt-1 block w-full" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold">Content</label>
                <textarea id="content" name="content" class="form-textarea mt-1 block w-full" rows="5" required></textarea>
            </div>
            <div class="mb-4">
                <label for="hashtags" class="block text-gray-700 font-bold">Hashtags</label>
                <input type="text" id="hashtags" name="hashtags" class="form-input mt-1 block w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
    </div>
</body>
</html>
