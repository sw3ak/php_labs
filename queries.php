<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выполнить запросы</title>
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
        .query-section {
            margin-bottom: 20px;
        }
        .query-section h2 {
            margin-bottom: 10px;
        }
        .query-section button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px 0;
        }
        .query-section button:hover {
            background-color: #218838;
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
<h1>Выполнить запросы</h1>

<?php
$mysqli = new mysqli("localhost", "root", "", "FlowerShop");
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query_type = $_POST['query'];
    $result = null;

    switch ($query_type) {
        case 'query1':
            $result = $mysqli->query("SELECT Customers.name AS customer_name, Flowers.name AS flower_name, Orders.order_date 
                                          FROM Customers 
                                          JOIN Orders ON Customers.id = Orders.customer_id 
                                          JOIN Flowers ON Flowers.id = Orders.flower_id");
            echo "<h2>Покупатели, заказы и цветы</h2>";
            break;

        case 'query2':
            $result = $mysqli->query("SELECT Flowers.name AS flower_name, COUNT(Orders.id) AS order_count 
                                          FROM Flowers 
                                          JOIN Orders ON Flowers.id = Orders.flower_id 
                                          GROUP BY Flowers.name 
                                          HAVING order_count > 1");
            echo "<h2>Цветы с более чем 1 заказом</h2>";
            break;

        case 'query3':
            $date = $_POST['date'] ?? '';
            if (!empty($date)) {
                $result = $mysqli->query("SELECT Customers.name, Orders.order_date 
                                              FROM Customers 
                                              JOIN Orders ON Customers.id = Orders.customer_id 
                                              WHERE Orders.order_date = '$date'");
                echo "<h2>Заказы на дату $date</h2>";
            } else {
                echo "<p style='color: red;'>Введите дату для выполнения этого запроса.</p>";
            }
            break;

        case 'custom_query':
            $custom_query = $_POST['custom_query'] ?? '';
            if (!empty($custom_query)) {
                $result = $mysqli->query($custom_query);
                echo "<h2>Результат пользовательского запроса</h2>";
            } else {
                echo "<p style='color: red;'>Введите запрос SQL для выполнения этого действия.</p>";
            }
            break;
    }

    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        while ($field = $result->fetch_field()) {
            echo "<th>{$field->name}</th>";
        }
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>$value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } elseif ($result) {
        echo "<p>Результаты отсутствуют.</p>";
    } else {
        echo "<p>Ошибка выполнения запроса: " . $mysqli->error . "</p>";
    }
}
?>

<form method="POST">
    <div class="query-section">
        <h2>Запросы из нескольких таблиц</h2>
        <button name="query" value="query1">Запрос 1: Покупатели, заказы и цветы</button>
        <button name="query" value="query2">Запрос 2: Цветы с более чем 1 заказом</button>
    </div>
    <div class="query-section">
        <h2>Запрос с использованием пользовательских данных</h2>
        <div class="input-group">
            <label for="date">Введите дату:</label>
            <input type="date" id="date" name="date">
        </div>
        <button name="query" value="query3">Запрос 3: Заказы на указанную дату</button>
    </div>
    <div class="query-section">
        <h2>Пользовательский SQL-запрос</h2>
        <div class="input-group">
            <label for="custom_query">Введите SQL-запрос:</label>
            <input type="text" id="custom_query" name="custom_query" placeholder="Введите свой SQL-запрос">
        </div>
        <button name="query" value="custom_query">Выполнить пользовательский запрос</button>
    </div>
</form>

<a href="index.php">Вернуться на главную</a>
</body>
</html>
