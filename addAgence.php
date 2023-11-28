<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksmanagement";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete entry if ID is provided in the URL
if (isset($_POST["delete_id"])) {
    $deleteId = $_POST["delete_id"];
    $deleteSql = "DELETE FROM agence WHERE id = ?";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        echo "Agence deleted successfully";
    } else {
        echo "Error deleting agence: " . $conn->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set before trying to access them
    $longitude = isset($_POST["longitude"]) ? $_POST["longitude"] : 0;
    $latitude = isset($_POST["latitude"]) ? $_POST["latitude"] : 0;
    $agenceName = isset($_POST["agence_name"]) ? $_POST["agence_name"] : null;

    // Insert data into the database
    $sql = "INSERT INTO agence (longitude, latitude, agence_name) VALUES (?, ?, ?)";

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dds", $longitude, $latitude, $agenceName);

    if ($stmt->execute()) {
        echo "Agence created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

?>

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
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-8">Agence System</h1>

            <!-- Agence Creation Form -->
            <div class="mb-8 bg-white p-8 rounded shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Create Agence</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    <!-- Longitude Input -->
                    <div class="mb-4">
                        <label for="longitude" class="block text-gray-700 text-sm font-bold mb-2">Longitude:</label>
                        <input type="text" id="longitude" name="longitude"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Latitude Input -->
                    <div class="mb-4">
                        <label for="latitude" class="block text-gray-700 text-sm font-bold mb-2">Latitude:</label>
                        <input type="text" id="latitude" name="latitude"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <div class="mb-4">
                        <label for="bank_name" class="block text-gray-700 text-sm font-bold mb-2">Agence Name:</label>
                        <input type="text" id="bank_name" name="bank_name"
                            class="w-full p-2 border border-gray-300 rounded">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Agence</button>
                </form>
            </div>

            <!-- Display Agences Section -->
            <div>
                <h2 class="text-2xl font-semibold mb-4">List of Agences</h2>

                <!-- Fetch and Display Data from Database -->
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Longitude</th>
                            <th class="py-2 px-4 border-b">Latitude</th>
                            <th class="py-2 px-4 border-b">Agence name</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data from the database
                        $result = $conn->query("SELECT * FROM agence");

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["id"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["longitude"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["latitude"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>" . $row["agence_name"] . "</td>";
                                echo "<td class='py-2 px-4 border-b'>
                                      <form action='{$_SERVER['PHP_SELF']}' method='post' onsubmit='return confirm(\"Are you sure you want to delete this agence?\");'>
                                          <input type='hidden' name='delete_id' value='" . $row["id"] . "'>
                                          <button type='submit' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600'>Delete</button>
                                      </form>
                                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No agences found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

<?php
// Close the database connection
$conn->close();
?>
