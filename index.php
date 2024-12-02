<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Магазин цветов</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        h1 {
            color: #444;
        }
        nav {
            margin-bottom: 20px;
        }
        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #007bff;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>Добро пожаловать в наш магазин цветов!</h1>
<h2>Выберите действие:</h2>
<ul>
    <li><a href="view_db.php?table=Flowers">Просмотреть Цветы</a></li>
    <li><a href="view_db.php?table=Customers">Просмотреть Покупателей</a></li>
    <li><a href="view_db.php?table=Orders">Просмотреть Заказы</a></li>
    <li><a href="add_flower.php">Добавить Цветок</a></li>
    <li><a href="add_customer.php">Добавить Покупателя</a></li>
    <li><a href="add_order.php">Добавить Заказ</a></li>
    <li><a href="queries.php">Выполнить Запросы</a></li>
</ul>
</body>
</html>
