<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить заказ</title>
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
<h1>Добавить заказ</h1>
<?php
$mysqli = new mysqli("localhost", "root", "", "FlowerShop");
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$flowers = $mysqli->query("SELECT id, name FROM Flowers");
$customers = $mysqli->query("SELECT id, name FROM Customers");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = intval($_POST['customer_id']);
    $flower_id = intval($_POST['flower_id']);
    $quantity = intval($_POST['quantity']);
    $error = "";
    if ($quantity <= 0) {
        $error = "Количество должно быть больше нуля.";
    }
    if (empty($error)) {
        $stmt = $mysqli->prepare("INSERT INTO Orders (customer_id, flower_id, order_date, quantity) VALUES (?, ?, NOW(), ?)");
        $stmt->bind_param("iii", $customer_id, $flower_id, $quantity);
        if ($stmt->execute()) {
            echo "<p class='message success'>Заказ успешно добавлен!</p>";
        } else {
            echo "<p class='message error'>Ошибка добавления заказа: {$mysqli->error}</p>";
        }
        $stmt->close();
    } else {
        echo "<p class='message error'>$error</p>";
    }
}
?>
<form method="POST">
    <div class="input-group">
        <label for="customer_id">Покупатель:</label>
        <select id="customer_id" name="customer_id" required>
            <?php while ($row = $customers->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="input-group">
        <label for="flower_id">Цветок:</label>
        <select id="flower_id" name="flower_id" required>
            <?php while ($row = $flowers->fetch_assoc()) { ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="input-group">
        <label for="quantity">Количество:</label>
        <input type="number" id="quantity" name="quantity" required>
    </div>
    <button type="submit">Добавить заказ</button>
</form>
<a href="index.php">Вернуться на главную</a>
</body>
</html>
