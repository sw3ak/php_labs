<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP</title>
</head>
<body>
<?php
    echo "<b>Первый пункт:</b><br>";
    $cust = ["cnum" => 2001, "cname" => 'Hoffman', "city" => 'London', "snum" => 1001, "rating" => 100];
    foreach ($cust as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "<b>Второй пункт:</b><br>";
    asort($cust);
    foreach ($cust as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "<b>Третий пункт:</b><br>";
    ksort($cust);
    foreach ($cust as $key => $value) {
        echo "$key: $value<br>";
    }
    echo "<b>Четвёртый пункт:</b><br>";
    sort($cust);
    foreach ($cust as $key => $value) {
        echo "$key: $value<br>";
    }
?>
</body>
</html>
