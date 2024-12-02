<?php
$mysqli = new mysqli("localhost", "root", "", "FlowerShop");
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

$table = $_GET['table'];

$result = $mysqli->query("SELECT * FROM $table");

if (!$result) {
    die("Ошибка выполнения запроса: " . $mysqli->error);
}

echo "<h1>Таблица: $table</h1>";
echo "<table border='1'>";
while ($field = $result->fetch_field()) {
    echo "<th>{$field->name}</th>";
}
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";
}
echo "</table>";

$mysqli->close();
?>
<a href="index.php">Вернуться на главную</a>
