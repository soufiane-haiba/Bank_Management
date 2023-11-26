<?php




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

<img class="w-40" src="./images/Cih-bank.png" alt="CIH Bank Image">


  <h1 class="text-3xl font-bold mb-8">Welcome to your Dashboard Admin</h1>

  <div class="bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Login</h2>

    <!-- Username Input -->
    <div class="mb-4">
      <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
      <input type="text" id="username" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <!-- Password Input -->
    <div class="mb-4">
      <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
      <input type="password" id="password" class="w-full p-2 border border-gray-300 rounded">
    </div>

    <!-- Validation Button -->
    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Submit</button>
  </div>

</body>
</html>
