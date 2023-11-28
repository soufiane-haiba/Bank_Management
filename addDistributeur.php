<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to your database (replace with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banksmanagement";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form
    $longitude = $_POST["distributorLongitude"];
    $latitude = $_POST["distributorLatitude"];
    $ville = $_POST["distributorVille"];
    $quartier = $_POST["distributorQuartier"];
    $rue = $_POST["distributorRue"];
    $codePostal = $_POST["distributorCodePostal"];
    $email = $_POST["distributorEmail"];
    $telephone = $_POST["distributorTelephone"];

    // Insert data into the database
    $sql = "INSERT INTO distribiteur (longitude, latitude, ville, quartier, rue, code_postal, email, telephone)
            VALUES ('$longitude', '$latitude', '$ville', '$quartier', '$rue', '$codePostal', '$email', '$telephone')";

    if ($conn->query($sql) === TRUE) {
        echo "Distributeur created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

          <!-- Longitude Input -->
          <div class="mb-4">
            <label for="distributorLongitude" class="block text-gray-700 text-sm font-bold mb-2">Longitude:</label>
            <input type="text" name="distributorLongitude" id="distributorLongitude" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Latitude Input -->
          <div class="mb-4">
            <label for="distributorLatitude" class="block text-gray-700 text-sm font-bold mb-2">Latitude:</label>
            <input type="text" name="distributorLatitude" id="distributorLatitude" class="w-full p-2 border border-gray-300 rounded">
          </div>

          <!-- Address Input -->
          <!-- Address Input -->
          <div class="mb-4">
              <label for="distributorVille" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
              <input type="text" name="distributorVille" id="distributorVille" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Ville">
              <input type="text" name="distributorQuartier" id="distributorQuartier" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Quartier">
              <input type="text" name="distributorRue" id="distributorRue" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Rue">
              <input type="text" name="distributorCodePostal" id="distributorCodePostal" class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Code Postal">
          </div>

          <!-- Submit Button with the same style as other pages -->
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Distributor</button>
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
