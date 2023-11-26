<?php /* Le code PHP que vous avez fourni */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Admin Dashboard - Transaction</title>
</head>
<body class="bg-gray-200 h-screen">

  <div class="flex h-full">

    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
      <h2 class="text-2xl font-bold">Admin Dashboard</h2>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <h1 class="text-3xl font-bold mb-8">Transaction System</h1>

      <!-- Transaction Creation Form -->
      <div class="mb-8 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create Transaction</h2>
        <form>

          <!-- Amount Input -->
          <div class="mb-4">
            <label for="transactionAmount" class="block text-gray-700 text-sm font-bold mb-2">Montant:</label>
            <input type="number" id="transactionAmount" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Transaction Type Input -->
          <div class="mb-4">
            <label for="transactionType" class="block text-gray-700 text-sm font-bold mb-2">Type:</label>
            <select id="transactionType" class="w-full p-2 border border-gray-300 rounded">
              <option value="debit">Débit</option>
              <option value="credit">Crédit</option>
            </select>
          </div>

          <!-- Submit Button with the same style as other pages -->
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Transaction</button>
        </form>
      </div>

      <!-- Display Transactions Section -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">List of Transactions</h2>

        <!-- Fake Data for Display in a Table -->
        <table class="min-w-full bg-white border border-gray-300">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Montant</th>
              <th class="py-2 px-4 border-b">Type</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b">1</td>
              <td class="py-2 px-4 border-b">100</td>
              <td class="py-2 px-4 border-b">Débit</td>
            </tr>
            <!-- Add more fake transactions as needed -->
          </tbody>
        </table>

      </div>
    </div>

  </div>

</body>
</html>
