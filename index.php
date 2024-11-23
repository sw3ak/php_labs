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
#FIRST
/*
    $color = "red";
    $color1 = "blue";
    $color2 = "green";
    $size = "10px";
    $size1 = "20px";
    $size2 = "30px";
    $text = "first text";
    $text1 = "second text";
    $text2 = "third text";
    echo "<span style='color: $color; font-size: $size;'> $text </span>" . "<br>";
    echo "<span style='color: $color1; font-size: $size1;'> $text1 </span>" . "<br>";
    echo "<span style='color: $color2; font-size: $size2;'> $text2 </span>";
/*
#SECOND
/*
    $var1 = "Alice";
    $var2 = "My friend is $var1";
    $var3 = 'My friend is $var1';
    #Отличие - в двойных кавычках мы можем использовать переменную,
    #                   а в одинарных это считается простым текстом
    $var4 = $var1;
    echo "BEFORE: $var1, $var2, $var3, $var4" . "<br>";
    $var1 = "Bob";
    echo "AFTER: $var1, $var2, $var3, $var4" . "<br>";
    $user = "Michael";
    echo "Static: $user" . ", dynamic: " . $$user = "Jackson";
*/
#THIRD
/*
    $p = 3.141592;
    echo "Число Пи равно $p" . "<br>";
    echo gettype($p) . "<br>";
    echo "Сейчас тип переменной p - " . gettype(intval($p)) . ", теперь тип переменной p - " . gettype(boolval($p));
*/
#FOURTH
/*
    #Чтобы запустить Alt+F12, в терминале пишем "php -S localhost:80", открываем браузер и пишем
    #                                                    "http://localhost:80/index.php?lang=ru"
    $lang = isset($_GET['lang']) ? $_GET['lang'] : '';
    if ($lang == "ru") {
        echo "русский";
    } else if ($lang == "en") {
        echo "английский";
    } else if ($lang == "fr") {
        echo "французский";
    } else if ($lang == "de") {
        echo "немецкий";
    } else {
        echo "язык неизвестен";
    }
*/
#FIFTH
/*
    #Чтобы запустить Alt+F12, в терминале пишем "php -S localhost:80", открываем браузер и пишем
    #                                         "http://localhost:80/index.php?lang=Ru&color=red"
    function Ru($color) {
        echo "<p style='color: $color;'>Здравствуйте!</p>";
    }
    function En($color) {
        echo "<p style='color: $color;'>Hello!</p>";
    }
    function Fr($color) {
        echo "<p style='color: $color;'>Bonjour!</p>";
    }
    function De($color) {
        echo "<p style='color: $color;'>Guten Tag!</p>";
    }
    $lang = isset($_GET['lang']) ? $_GET['lang'] : '';
    $color = isset($_GET['color']) ? $_GET['color'] : 'black';
    $lang($color);
*/
?>
</body>
</html>
