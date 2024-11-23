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
    $treug = [];
    for ($n = 1; $n <= 30; $n++) {
        $treug[] = ($n * ($n + 1)) / 2;
    }
    foreach ($treug as $item) echo $item . "  ";
    echo "<br>";
    $kvd = [];
    for ($n = 1; $n <= 30; $n++) {
        $kvd[] = $n ** 2;
    }
    foreach ($kvd as $item) echo $item . "  ";
    echo "<br><b>Второй пункт:</b><br>";
    echo "<table border='1'>";
    for ($i = 1; $i <= 30; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 30; $j++) {
            $value = $i * $j;
            if (in_array($value, $kvd) && in_array($value, $treug)) {
                $bgcolor = "red";
            } elseif (in_array($value, $kvd)) {
                $bgcolor = "blue";
            } elseif (in_array($value, $treug)) {
                $bgcolor = "green";
            } else {
                $bgcolor = "white";
            }
            echo "<td style='background-color: $bgcolor; font-size: 1em;'>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "<br>Треугольные числа: ";
    foreach ($treug as $item) {
        echo $item . "  ";
    }

?>
</body>
</html>
