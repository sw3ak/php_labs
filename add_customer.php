<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить покупателя</title>
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
<h1>Добавить покупателя</h1>
<?php
$mysqli = new mysqli("localhost", "root", "", "FlowerShop");
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $error = "";

    if (!preg_match("/^[a-zA-Zа-яА-Я0-9\s]+$/u", $name)) {
        $error = "Имя должно содержать только буквы, цифры и пробелы.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Введите корректный email.";
    }

    if (empty($error)) {
        $stmt = $mysqli->prepare("INSERT INTO Customers (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        if ($stmt->execute()) {
            echo "<p class='message success'>Покупатель успешно добавлен!</p>";
        } else {
            echo "<p class='message error'>Ошибка добавления покупателя: {$mysqli->error}</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='message error'>$error</p>";
    }
}
?>
<form method="POST">
    <div class="input-group">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <button type="submit">Добавить покупателя</button>
</form>
<a href="index.php">Вернуться на главную</a>
</body>
</html>
