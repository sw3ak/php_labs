<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FlowerShop";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "База данных $dbname успешно создана.<br>";
} else {
    die("Ошибка при создании базы данных: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS Flowers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    color VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Таблица Flowers успешно создана.<br>";
} else {
    die("Ошибка при создании таблицы Flowers: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS Customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Таблица Customers успешно создана.<br>";
} else {
    die("Ошибка при создании таблицы Customers: " . $conn->error);
}

$sql = "CREATE TABLE IF NOT EXISTS Orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    flower_id INT NOT NULL,
    order_date DATE NOT NULL,
    quantity INT NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES Customers(id),
    FOREIGN KEY (flower_id) REFERENCES Flowers(id)
)";
if ($conn->query($sql) === TRUE) {
    echo "Таблица Orders успешно создана.<br>";
} else {
    die("Ошибка при создании таблицы Orders: " . $conn->error);
}

$conn->close();
?>
