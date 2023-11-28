<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the entered username and password match the admin credentials
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    $adminUsername = "admin";
    $adminPassword = "admin";

    if ($enteredUsername == $adminUsername && $enteredPassword == $adminPassword) {
        // Redirect to admin.php
        header("Location: addAdmin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>CIH Bank</title>
  <script src="index.js" defer></script>
</head>
<body class="bg-gray-200 h-screen flex flex-col items-center justify-center">
    <!-- Your existing body content -->

    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Login</h2>

        <form method="post" action="">
            <!-- Username Input -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
                <input type="text" name="username" id="username" class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded">
            </div>

            <!-- Validation Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
</body>
</html>

