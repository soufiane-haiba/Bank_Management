<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banksmanagement";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to delete a bank by ID
function deleteBank($bankId, $conn) {
    $sqlDeleteBank = "DELETE FROM Bank WHERE id = $bankId";
    if ($conn->query($sqlDeleteBank) === TRUE) {
        echo "Bank deleted successfully";
    } else {
        echo "Error deleting bank: " . $conn->error;
    }
}

// Fetch banks from the database
$sqlSelectBanks = "SELECT * FROM Bank";
$result = $conn->query($sqlSelectBanks);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted
    if (isset($_POST["bankName"]) && isset($_FILES["logo"])) {
        $name = $_POST["bankName"];
        $logoTmpName = $_FILES["logo"]["tmp_name"];
        $logoType = $_FILES["logo"]["type"];

        $allowedTypes = ["image/jpeg", "image/png", "image/gif"];

        if (in_array($logoType, $allowedTypes)) {
            $logo = addslashes(file_get_contents($logoTmpName));

            // Insert bank
            $sqlInsertBank = "INSERT INTO Bank (nom, logo) VALUES ('$name', '$logo')";

            if ($conn->query($sqlInsertBank) === TRUE) {
                echo "Bank added successfully";
            } else {
                echo "Error: " . $sqlInsertBank . "<br>" . $conn->error;
            }
        } else {
            echo "Invalid file type. Only JPEG, PNG, and GIF images are allowed.";
        }
    }

    // Handle bank deletion
    if (isset($_POST['deleteBankId'])) {
        $deleteBankId = $_POST['deleteBankId'];
        deleteBank($deleteBankId, $conn);
        // Refresh the page after deletion
        header("Location: {$_SERVER['PHP_SELF']}");
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
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-200 h-screen">

<div class="flex h-full">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-white p-4 w-64">
        <h2 class="text-2xl font-bold">Admin Dashboard</h2>
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
            <form method="post" action="" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="bankName" class="block text-gray-700 text-sm font-bold mb-2">Bank Name:</label>
                    <input type="text" id="bankName" name="bankName" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <div class="mb-4">
                    <label for="logo" class="block text-gray-700 text-sm font-bold mb-2 w-20">Logo:</label>
                    <input type="file" id="logo" name="logo" accept="image/*" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Bank
                </button>
            </form>
        </div>

        <!-- Display Banks Section -->
        <div>
            <h2 id="agence" class="text-2xl font-semibold mb-4">List of Banks</h2>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Bank Name</th>
                    <th class="py-2 px-4 border-b">Logo</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b'>{$row['id']}</td>";
                    // Make the bank name clickable
                    echo "<td class='py-2 px-4 border-b'><a href='agence.php?id={$row['id']}'>{$row['nom']}</a></td>";
                    echo "<td class='py-2 px-4 border-b'><img src='data:image/jpeg;base64," . base64_encode($row['logo']) . "' alt='Bank Logo' class='w-10 h-10'></td>";
                    echo "<td class='py-2 px-4 border-b'>
                            <form method='post'>
                                <input type='hidden' name='deleteBankId' value='{$row['id']}'>
                                <button type='submit' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600'>Delete</button>
                            </form>
                          </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
