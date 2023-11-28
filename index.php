<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$databaseName = "banksmanagement";

// Create database
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
    die();
}

// Select the created database
$conn->select_db($databaseName);

// Create "Bank" table
$tableName = "Bank";
$sqlCreateTableBank = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(15) NOT NULL,
    logo LONGBLOB
)";

if ($conn->query($sqlCreateTableBank) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create "Agence" table
$tableName = "Agence";
$sqlCreateTableAgence = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT PRIMARY KEY AUTO_INCREMENT,
    longitude FLOAT NOT NULL,
    latitude FLOAT NOT NULL,
    agence_name VARCHAR(15) NOT NULL,
    bank_id INT,
    address_id INT,
    FOREIGN KEY (bank_id) REFERENCES Bank(id),
    FOREIGN KEY (address_id) REFERENCES Address(id)
)";

if ($conn->query($sqlCreateTableAgence) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create "Address" table
$tableName = "Address";
$sqlCreateTableAddress = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT PRIMARY KEY AUTO_INCREMENT,
    ville VARCHAR(15),
    quartier VARCHAR(15),
    rue VARCHAR(15),
    code_postal INT(7),
    telephone INT(12)
)";

if ($conn->query($sqlCreateTableAddress) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create "Client" table
$tableName = "Client";
$sqlCreateTableClient = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE,
    nationalite VARCHAR(255),
    genre VARCHAR(10),
    adresse VARCHAR(255),
    telephone VARCHAR(20),
    address_id INT,
    agence_id INT,
    FOREIGN KEY (agence_id) REFERENCES Agence(id),
    FOREIGN KEY (address_id) REFERENCES Address(id)
)";

if ($conn->query($sqlCreateTableClient) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}
$createTableSQL = "CREATE TABLE IF NOT EXISTS distribiteur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    longitude VARCHAR(255) NOT NULL,
    latitude VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    quartier VARCHAR(255) NOT NULL,
    rue VARCHAR(255) NOT NULL,
    code_postal VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telephone VARCHAR(20) NOT NULL
)";

if ($conn->query($createTableSQL) === TRUE) {
echo "Table 'distribiteur' created successfully or already exists.<br>";
} else {
echo "Error creating table: " . $conn->error . "<br>";
}



// Create "Distribiteur" table
$tableName = "Distribiteur";
$sqlCreateTableDistribiteur = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    longitude VARCHAR(255) NOT NULL,
    latitude VARCHAR(255) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    quartier VARCHAR(255) NOT NULL,
    rue VARCHAR(255) NOT NULL,
    code_postal VARCHAR(20) NOT NULL,
    agence_id INT,
    address_id INT,
    FOREIGN KEY (agence_id) REFERENCES Agence(id),
    FOREIGN KEY (address_id) REFERENCES Address(id)
)";

if ($conn->query($sqlCreateTableDistribiteur) === TRUE) {
    echo "Table $tableName created successfully";
} else {
    echo "Error creating table $tableName: " . $conn->error;
}



// Close the connection
$conn->close();
?>
