<?php /* Le code PHP que vous avez fourni */ ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Admin Dashboard - Client</title>
</head>
<body class="bg-gray-200 h-screen">

  <div class="flex h-full">

    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
      <h2 class="text-2xl font-bold">Admin Dashboard</h2>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8">
      <h1 class="text-3xl font-bold mb-8">Client System</h1>

      <!-- Client Creation Form -->
      <div class="mb-8 bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-semibold mb-4">Create Client</h2>
        <form>

          <!-- Last Name Input -->
          <div class="mb-4">
            <label for="clientLastName" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
            <input type="text" id="clientLastName" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- First Name Input -->
          <div class="mb-4">
            <label for="clientFirstName" class="block text-gray-700 text-sm font-bold mb-2">Prénom:</label>
            <input type="text" id="clientFirstName" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Date of Birth Input -->
          <div class="mb-4">
            <label for="clientDOB" class="block text-gray-700 text-sm font-bold mb-2">Date de naissance:</label>
            <input type="date" id="clientDOB" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Nationality Input -->
          <div class="mb-4">
            <label for="clientNationality" class="block text-gray-700 text-sm font-bold mb-2">Nationalité:</label>
            <input type="text" id="clientNationality" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Gender Input -->
          <div class="mb-4">
            <label for="clientGender" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
            <select id="clientGender" class="w-full p-2 border border-gray-300 rounded">
              <option value="male">Homme</option>
              <option value="female">Femme</option>
              <option value="other">Autre</option>
            </select>
          </div>

          <!-- Address Input -->
          <div class="mb-4">
            <label for="clientAddress" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
            <input type="text" id="clientVille" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Ville">
            <input type="text" id="clientQuartier" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Quartier">
            <input type="text" id="clientRue" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Rue">
            <input type="text" id="clientCodePostal" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Code Postal">
            <input type="tel" id="clientTelephone" class="w-full p-2 border border-gray-300 rounded" placeholder="Téléphone">
          </div>

          <!-- Submit Button -->
          <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Client</button>
        </form>
      </div>

      <!-- Display Clients Section -->
      <div>
        <h2 class="text-2xl font-semibold mb-4">List of Clients</h2>

        <!-- Fake Data for Display in a Table -->
        <table class="min-w-full bg-white border border-gray-300">
          <thead>
            <tr>
              <th class="py-2 px-4 border-b">ID</th>
              <th class="py-2 px-4 border-b">Nom</th>
              <th class="py-2 px-4 border-b">Prénom</th>
              <th class="py-2 px-4 border-b">Date de naissance</th>
              <th class="py-2 px-4 border-b">Nationalité</th>
              <th class="py-2 px-4 border-b">Genre</th>
              <th class="py-2 px-4 border-b">Adresse</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="py-2 px-4 border-b">1</td>
              <td class="py-2 px-4 border-b">soufiane</td>
              <td class="py-2 px-4 border-b">haiba</td>
              <td class="py-2 px-4 border-b">1999-01-31</td>
              <td class="py-2 px-4 border-b">Marocain</td>
              <td class="py-2 px-4 border-b">Homme</td>
              <td class="py-2 px-4 border-b">Casablanca, Maarif, 123</td>
            </tr>
            <!-- Add more fake clients as needed -->
          </tbody>
        </table>

      </div>
    </div>

  </div>

</body>
</html>
