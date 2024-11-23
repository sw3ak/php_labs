<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($conn->query("CREATE DATABASE IF NOT EXISTS {$dbname}") !== TRUE) {
    echo "Error creating database: " . $conn->error;
}
else {
    $sql_create_table = "CREATE TABLE IF NOT EXISTS notebook_br01 (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        address VARCHAR(50) NOT NULL,
        birthday DATE NOT NULL,
        mail VARCHAR(50) NOT NULL)";
    if ($conn->query($sql_create_table) === TRUE) {
        echo "Table notebook_br01 created successfully";
    }
}

$conn->close();
?>
