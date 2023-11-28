<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Admin Dashboard - Distributor</title>
</head>
<body class="bg-gray-200 h-screen">

  <div class="flex h-full">

    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
      <h2 class="text-2xl font-bold">Admin Dashboard</h2>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <h1 class="text-3xl font-bold mb-8">Distributor System</h1>

      <!-- Distributor Creation Form -->
      <div class="mb-8 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create Distributor</h2>
        <form>

          <!-- Longitude Input -->
          <div class="mb-4">
            <label for="distributorLongitude" class="block text-gray-700 text-sm font-bold mb-2">Longitude:</label>
            <input type="text" id="distributorLongitude" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Latitude Input -->
          <div class="mb-4">
            <label for="distributorLatitude" class="block text-gray-700 text-sm font-bold mb-2">Latitude:</label>
            <input type="text" id="distributorLatitude" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Address Input -->
          <div class="mb-4">
            <label for="distributorAddress" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
            <input type="text" id="distributorVille" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Ville">
            <input type="text" id="distributorQuartier" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Quartier">
            <input type="text" id="distributorRue" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Rue">
            <input type="text" id="distributorCodePostal" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Code Postal">
            <input type="email" id="distributorEmail" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Email">
            <input type="tel" id="distributorTelephone" class="w-full p-2 border border-gray-300 rounded" placeholder="Téléphone">
          </div>

          <!-- Submit Button with the same style as other pages -->
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Distributor</button>
        </form>
      </div>

      <!-- Display Distributors Section -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">List of Distributors</h2>

        <!-- Fake Data for Display in a Table -->
        <table class="min-w-full bg-white border border-gray-300">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Longitude</th>
              <th class="py-2 px-4 border-b">Latitude</th>
              <th class="py-2 px-4 border-b">Address</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b">1</td>
              <td class="py-2 px-4 border-b">-6.8325</td>
              <td class="py-2 px-4 border-b">33.9878</td>
              <td class="py-2 px-4 border-b">123 moulay youssef safi</td>
            </tr>
            <!-- Add more fake distributors as needed -->
          </tbody>
        </table>

      </div>
    </div>

  </div>

</body>
</html>
