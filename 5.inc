<?php
function vid_structure($table, $conn) {
    echo "<h4>Структура таблицы: $table</h4>";
    $query = "DESCRIBE $table";
    $result = $conn->query($query);

    if (!$result) {
        die("Ошибка выполнения запроса: " . $conn->error);
    }

    echo "<table border='1'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['Field']}</td>";
        echo "<td>{$row['Type']}</td>";
        echo "<td>{$row['Null']}</td>";
        echo "<td>{$row['Key']}</td>";
        echo "<td>{$row['Default']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function vid_content($table, $conn) {
    $rus_name = [
        "snum" => "Номер продавца",
        "sname" => "Имя продавца",
        "city" => "Город",
        "comm" => "Комиссия",
        "cnum" => "Номер клиента",
        "cname" => "Имя клиента",
        "rating" => "Рейтинг",
        "onum" => "Номер заказа",
        "amt" => "Сумма заказа",
        "odate" => "Дата заказа"
    ];

    $all_flags = [
        "NOT_NULL_FLAG" => 1,
        "PRI_KEY_FLAG" => 2,
        "UNIQUE_KEY_FLAG" => 4,
        "MULTIPLE_KEY_FLAG" => 8,
        "BLOB_FLAG" => 16,
        "UNSIGNED_FLAG" => 32,
        "ZEROFILL_FLAG" => 64,
        "BINARY_FLAG" => 128,
        "ENUM_FLAG" => 256,
        "AUTO_INCREMENT_FLAG" => 512,
        "TIMESTAMP_FLAG" => 1024,
        "SET_FLAG" => 2048,
        "PART_KEY_FLAG" => 16384,
        "GROUP_FLAG" => 32768,
        "NUM_FLAG" => 32768,
        "UNIQUE_FLAG" => 65536
    ];

    echo "<h4>Содержимое таблицы: $table</h4>";
    $query = "SELECT * FROM $table";
    $result = $conn->query($query);

    if (!$result) {
        die("Ошибка выполнения запроса: " . $conn->error);
    }

    echo "<table border='1'>";
    echo "<tr>";
    $fields = $result->fetch_fields();

    echo "Установленные флаги:\n";
    foreach ($fields as $field) {
        $field_name = $field->name;
        $fl = $field->flags;
        echo "<br>" . $field_name . " : ";
        foreach ($all_flags as $flag_name => $flag_value) {
            if ($fl & $flag_value) {
                echo "<br>";
                echo $flag_name;
            }
        }
        $rus = isset($rus_name[$field_name]) ? $rus_name[$field_name] : $field_name;
        echo "<th>$rus<br>($field_name)</th>";
    }
    echo "</tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $col) {
            echo "<td>$col</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

if (isset($_GET['table'])) {
    $table = $_GET['table'];
    if (isset($_GET['structure'])) {
        vid_structure($table, $conn);
    }
    if (isset($_GET['content'])) {
        vid_content($table, $conn);
    }
}

echo '<br><a href="1.html">Вернуться к выбору таблицы</a>';
?>
