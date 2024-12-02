<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить цветок</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1 {
            color: #444;
        }
        form {
            margin-top: 20px;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .input-group input {
            width: calc(100% - 10px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 15px;
            font-weight: bold;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>
<h1>Добавить цветок</h1>
<?php
$mysqli = new mysqli("localhost", "root", "", "FlowerShop");
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $color = trim($_POST['color']);
    $price = floatval($_POST['price']);
    $error = "";

    if (!preg_match("/^[a-zA-Zа-яА-Я\s]+$/u", $name)) {
        $error = "Название цветка должно содержать только буквы и пробелы.";
    } elseif (!preg_match("/^[a-zA-Zа-яА-Я\s]+$/u", $color)) {
        $error = "Цвет должен содержать только буквы и пробелы.";
    } elseif ($price <= 0) {
        $error = "Цена должна быть положительным числом.";
    }

    if (empty($error)) {
        $stmt = $mysqli->prepare("INSERT INTO Flowers (name, color, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $color, $price);
        if ($stmt->execute()) {
            echo "<p class='message success'>Цветок успешно добавлен!</p>";
        } else {
            echo "<p class='message error'>Ошибка добавления цветка: {$mysqli->error}</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='message error'>$error</p>";
    }
}
?>
<form method="POST">
    <div class="input-group">
        <label for="name">Название:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="input-group">
        <label for="color">Цвет:</label>
        <input type="text" id="color" name="color" required>
    </div>
    <div class="input-group">
        <label for="price">Цена:</label>
        <input type="number" step="0.01" id="price" name="price" required>
    </div>
    <button type="submit">Добавить цветок</button>
</form>
<a href="index.php">Вернуться на главную</a>
</body>
</html>
