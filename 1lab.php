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
    echo "<b>Первый пункт:</b> ";
    $treug = [];
    for ($n = 1; $n <= 10; $n++) {
        $treug[] = ($n * ($n + 1)) / 2;
    }
    foreach ($treug as $item) echo $item . "  ";
    echo "<br><b>Второй пункт:</b> ";
    $kvd = [];
    for ($n = 1; $n <= 10; $n++) {
        $kvd[] = $n ** 2;
    }
    foreach ($kvd as $item) echo $item . "  ";
    echo "<br><b>Третий пункт:</b> ";
    $rez = [];
    for ($n = 1; $n <= count($kvd)+count($treug); $n++) {
        if ($n % 2 != 0) {
            $rez[$n-1] = $treug[$n - ((($n - 1) / 2) + 1)];
        } else {
            $rez[$n - 1] = $kvd[$n - (($n / 2) + 1)];
        }
    }
    foreach ($rez as $item) echo $item . "  ";
    echo "<br><b>Четвёртый пункт:</b> ";
    sort($rez);
    foreach ($rez as $item) echo $item . "  ";
    echo "<br><b>Пятый пункт:</b> ";
    unset($rez[0]);
    foreach ($rez as $item) echo $item . "  ";
    #для проверки 6го пункта закинем немного любых чисел из уже известного массива rez
    $rez[count($rez) + 1] = 15;
    $rez[count($rez) + 2] = 10;
    $rez[count($rez) + 3] = 36;
    $rez[count($rez) + 4] = 28;
    $rez[count($rez) + 5] = 6;
    echo "<br>Добавили значения для проверки: ";
    foreach ($rez as $item) echo $item . "  ";
    echo "<br><b>Шестой пункт:</b> ";
    $rez1 = array_unique($rez);
    foreach ($rez1 as $item) echo $item . "  ";
?>
</body>
</html>
