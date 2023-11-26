<?php /* Le code PHP que vous avez fourni */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Admin Dashboard</title>
</head>
<body class="bg-gray-200 h-screen">

  <div class="flex h-full">

    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
      <h2 class="text-2xl font-bold">Admin Dashboard</h2>
      <!-- Ajouter un lien vers la section "Agence" -->
      <ul class="mt-4">
        <li><a href="agence.php" class="text-gray-300 hover:text-white">Les Agences</a></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <h1 class="text-3xl font-bold mb-8">Bank System</h1>

      <!-- Bank Creation Form -->
      <div class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Create Bank</h2>
        <form>
          <!-- Bank Name Input -->
          <div class="mb-4">
            <label for="bankName" class="block text-gray-700 text-sm font-bold mb-2">Bank Name:</label>
            <input type="text" id="bankName" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Logo Input -->
          <div class="mb-4">
            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2 w-20">Logo:</label>
            <input type="file" id="logo" name="logo" accept="image/*" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Other Bank Information Inputs -->

          <!-- Submit Button -->
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Bank</button>
        </form>
      </div>

      <!-- Display Banks Section -->
      <div>
        <h2 id="agence" class="text-2xl font-semibold mb-4">List of Banks</h2>

        <!-- Fake Data for Display in a Table -->
        <table class="min-w-full bg-white border border-gray-300">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Bank Name</th>
              <th class="py-2 px-4 border-b">Logo</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b">1</td>
              <td class="py-2 px-4 border-b">Bank Name 1</td>
              <td class="py-2 px-4 border-b"><img src="fake_logo_1.png" alt="Bank Logo 1" class="w-10 h-10"></td>
            </tr>
            <tr>
              <td class="py-2 px-4 border-b">2</td>
              <td class="py-2 px-4 border-b">Bank Name 2</td>
              <td class="py-2 px-4 border-b"><img src="fake_logo_2.png" alt="Bank Logo 2" class="w-10 h-10"></td>
            </tr>
            <!-- Add more fake banks as needed -->
          </tbody>
        </table>

      </div>
    </div>

  </div>

</body>
</html>
