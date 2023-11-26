<?php /* Le code PHP que vous avez fourni */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Admin Dashboard - Account</title>
</head>
<body class="bg-gray-200 h-screen">

  <div class="flex h-full">

    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
      <h2 class="text-2xl font-bold">Admin Dashboard</h2>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <h1 class="text-3xl font-bold mb-8">Account System</h1>

      <!-- Account Creation Form -->
      <div class="mb-8 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create Account</h2>
        <form>

          <!-- Balance Input -->
          <div class="mb-4">
            <label for="accountBalance" class="block text-gray-700 text-sm font-bold mb-2">Balance:</label>
            <input type="number" id="accountBalance" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Currency Input -->
          <div class="mb-4">
            <label for="accountCurrency" class="block text-gray-700 text-sm font-bold mb-2">Devise:</label>
            <select id="accountCurrency" class="w-full p-2 border border-gray-300 rounded">
              <option value="usd">USD</option>
              <option value="eur">EUR</option>
              <option value="gbp">GBP</option>
              <!-- Add more currency options as needed -->
            </select>
          </div>

          <!-- Submit Button with the same style as other pages -->
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Account</button>
        </form>
      </div>

      <!-- Display Accounts Section -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">List of Accounts</h2>

        <!-- Fake Data for Display in a Table -->
        <table class="min-w-full bg-white border border-gray-300">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Balance</th>
              <th class="py-2 px-4 border-b">Devise</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b">1</td>
              <td class="py-2 px-4 border-b">$1000.00</td>
              <td class="py-2 px-4 border-b">USD</td>
            </tr>
            <!-- Add more fake accounts as needed -->
          </tbody>
        </table>

      </div>
    </div>

  </div>

</body>
</html>
