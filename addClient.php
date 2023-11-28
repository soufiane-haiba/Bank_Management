<?php
// Check if the form is submitted for adding a client
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these values with your actual database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "banksmanagement";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get data from the form for adding a client
    if (isset($_POST["add_client"])) {
        $nom = isset($_POST["clientLastName"]) ? $_POST["clientLastName"] : '';
        $prenom = isset($_POST["clientFirstName"]) ? $_POST["clientFirstName"] : '';
        $date_naissance = isset($_POST["clientDOB"]) ? $_POST["clientDOB"] : '';
        $nationalite = isset($_POST["clientNationality"]) ? $_POST["clientNationality"] : '';
        $genre = isset($_POST["clientGender"]) ? $_POST["clientGender"] : '';

        // Check if the address fields are set
        $ville = isset($_POST["clientVille"]) ? $_POST["clientVille"] : '';
        $quartier = isset($_POST["clientQuartier"]) ? $_POST["clientQuartier"] : '';
        $rue = isset($_POST["clientRue"]) ? $_POST["clientRue"] : '';
        $code_postal = isset($_POST["clientCodePostal"]) ? $_POST["clientCodePostal"] : '';

        // Concatenate address fields only if they are set
        $adresse = ($ville || $quartier || $rue || $code_postal) ? "$ville, $quartier, $rue, $code_postal" : '';

        $telephone = isset($_POST["clientTelephone"]) ? $_POST["clientTelephone"] : '';

        // Insert data into the database
        $sql = "INSERT INTO Client (nom, prenom, date_naissance, nationalite, genre, adresse, telephone)
                VALUES ('$nom', '$prenom', '$date_naissance', '$nationalite', '$genre', '$adresse', '$telephone')";

        if ($conn->query($sql) === TRUE) {
            echo "Client created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Get the client ID from the form for deletion
    if (isset($_POST["delete_client"]) && isset($_POST["client_id"])) {
        $client_id = $_POST["client_id"];

        // Perform the deletion
        $sql_delete = "DELETE FROM Client WHERE id = '$client_id'";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Client deleted successfully";
        } else {
            echo "Error: " . $sql_delete . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}

// Fetch clients from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksmanagement";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

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
            <ul class="mt-4">
            <li><a href="addAdmin.php" class="text-gray-300 hover:text-white">Create Bank</a></li>
            <li><a href="addAgence.php" class="text-gray-300 hover:text-white">Create Agence</a></li>
            <li><a href="addDistributeur.php" class="text-gray-300 hover:text-white">Create Distribiteur</a></li>
            <li><a href="#" class="text-gray-300 hover:text-white">Create Client</a></li>
        </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Client System</h1>

            <!-- Client Creation Form -->
            <div class="mb-8 bg-white p-8 rounded shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Create Client</h2>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                    <!-- Last Name Input -->
                    <div class="mb-4">
                        <label for="clientLastName" class="block text-gray-700 text-sm font-bold mb-2">Nom:</label>
                        <input type="text" name="clientLastName" id="clientLastName"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- First Name Input -->
                    <div class="mb-4">
                        <label for="clientFirstName" class="block text-gray-700 text-sm font-bold mb-2">Prénom:</label>
                        <input type="text" name="clientFirstName" id="clientFirstName"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Date of Birth Input -->
                    <div class="mb-4">
                        <label for="clientDOB" class="block text-gray-700 text-sm font-bold mb-2">Date de
                            naissance:</label>
                        <input type="date" name="clientDOB" id="clientDOB"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Nationality Input -->
                    <div class="mb-4">
                        <label for="clientNationality"
                            class="block text-gray-700 text-sm font-bold mb-2">Nationalité:</label>
                        <input type="text" name="clientNationality" id="clientNationality"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Gender Input -->
                    <div class="mb-4">
                        <label for="clientGender" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                        <select name="clientGender" id="clientGender"
                            class="w-full p-2 border border-gray-300 rounded">
                            <option value="male">Homme</option>
                            <option value="female">Femme</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>

                    <!-- Address Input -->
                    <div class="mb-4">
                        <label for="clientVille" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
                        <input type="text" name="clientVille" id="clientVille"
                            class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Ville">
                        <input type="text" name="clientQuartier" id="clientQuartier"
                            class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Quartier">
                        <input type="text" name="clientRue" id="clientRue"
                            class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Rue">
                        <input type="text" name="clientCodePostal" id="clientCodePostal"
                            class="w-full p-2 border border-gray-300 rounded mb-2" placeholder="Code Postal">
                        <input type="tel" name="clientTelephone" id="clientTelephone"
                            class="w-full p-2 border border-gray-300 rounded" placeholder="Téléphone">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="add_client"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Client</button>
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
                            <th class="py-2 px-4 border-b">Actions</th> <!-- New column for delete button -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch clients from the database
                        $sql = "SELECT * FROM Client";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["id"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["nom"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["prenom"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["date_naissance"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["nationalite"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["genre"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["adresse"] . "</td>";

                                // Add the delete button
                                echo "<td class='py-2 px-4 border-b'><form method='post' action=''>";
                                echo "<input type='hidden' name='client_id' value='" . $row["id"] . "'>";
                                echo "<button type='submit' name='delete_client' class='bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600'>Delete</button>";
                                echo "</form></td>";

                                echo "</tr>";
                            }
                        } else {
                            echo "0 results";
                        }

                        // Close the database connection
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
