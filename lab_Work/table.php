<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book Information</title>
</head>
<body>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <form action="submit_book.php" method="POST" class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg mt-8">
        <div class="mb-6">
                <h2 class="text-center  text-2xl py-5">Add Book Information</h2>
            <label for="title" class="block text-gray-700 font-semibold mb-2">Book Title:</label>
            <input type="text" id="title" name="title" required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-6">
            <label for="author" class="block text-gray-700 font-semibold mb-2">Author:</label>
            <input type="text" id="author" name="author" required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description:</label>
            <textarea id="description" name="description" rows="4" cols="50" required
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <button type="submit"
            class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
            Submit
        </button>
    </form>

</body>
</html>
