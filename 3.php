<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вывод и редактирование таблицы</title>
</head>
<body>
<h1>Записи в таблице</h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$tbname = "notebook_br01";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

$sql = "SELECT * FROM {$tbname}";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form method='POST' action='3.php'>";
    echo "<table border='2'>";
    echo "<tr><th>Выбрать</th><th>ID</th><th>Name</th><th>Address</th><th>City</th><th>Birthday</th><th>Mail</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<td><input type='radio' name='id' value='" . $row['id'] . "'></td>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['birthday'] . "</td>";
        echo "<td>" . $row['mail'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<button type='submit' name='action' value='edit'>Редактировать выбранную запись</button>";
    echo "</form>";
} else {
    echo "No records found." . $conn->error;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    if ($action == 'edit' && isset($_POST['id'])) {
        $edit_id = $_POST['id'];
    } elseif ($action == 'update' && isset($_POST['id']) && isset($_POST['field_name'])) {
        $id = $_POST['id'];
        $field_name = $_POST['field_name'];
        $field_value = $_POST['field_value'];
        if ($field_value == "") {
            echo "not NULL. Rewrite please!";
        }
        if ($field_name == "name") {
            if (preg_match('/^[a-zA-Z0-9]+$/i', $field_name)) {
                echo "Error. Rename please.";
            }
            else {
                $sql_update = "UPDATE $tbname SET $field_name='$field_value' WHERE id='$id'";
                $conn->query($sql_update);
            }
        }
        $sql_update = "UPDATE $tbname SET $field_name='$field_value' WHERE id='$id'";
        $conn->query($sql_update);
    }
}
$conn->close();
?>

<?php if (isset($edit_id)): ?>
    <h2>Редактировать запись</h2>
    <form method="POST" action="3.php">
        <select name="field_name" required>
            <option value="name">Имя</option>
            <option value="address">Адрес</option>
            <option value="city">Город</option>
            <option value="birthday">День рождения</option>
            <option value="mail">Почта</option>
        </select>
        <input type="text" name="field_value" placeholder="Новое значение" required>
        <input type="hidden" name="id" value="<?php echo $edit_id; ?>">
        <button type="submit" name="action" value="update">Заменить</button>
    </form>
<?php endif; ?>
</body>
</html>

