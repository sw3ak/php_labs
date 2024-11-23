<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Результат</title>
</head>
<body>
<?php
    $name = $_POST['name'];
    $answer_1 = $_POST['1'];
    $answer_2 = $_POST['2'];
    $answer_3 = $_POST['3'];
    $answer_4 = $_POST['4'];
    $answer_5 = $_POST['5'];
    $otv = ["1" => 1, "2" => 2, "3" => 2, "4" => 1, "5" => 1];
    $sum_true_answer = 0;
    $percent_true_answer = 0;
    if ($answer_1 == $otv["1"]) {
        $sum_true_answer++;
        $percent_true_answer = $percent_true_answer + (100 / count($otv));
    }
    if ($answer_2 == $otv["2"]) {
        $sum_true_answer++;
        $percent_true_answer = $percent_true_answer + (100 / count($otv));
    }
    if ($answer_3 == $otv["3"]) {
        $sum_true_answer++;
        $percent_true_answer = $percent_true_answer + (100 / count($otv));
    }
    if ($answer_4 == $otv["4"]) {
        $sum_true_answer++;
        $percent_true_answer = $percent_true_answer + (100 / count($otv));
    }
    if ($answer_5 == $otv["5"]) {
        $sum_true_answer++;
        $percent_true_answer = $percent_true_answer + (100 / count($otv));
    }
    switch ($sum_true_answer) {
        case 0:
            $text = "Ужас! Вы ничего не знаете. Пройдите тест заново.";
            break;
        case 1:
            $text = "Вы плохо разбираетесь в теме, ваши знания всего лишь: $percent_true_answer%.";
            break;
        case 2:
            $text = "Вы недостаточно хорошо разбираетесь в теме, ваши знания составляют: $percent_true_answer%.";
            break;
        case 3:
            $text = "Вы знаете $percent_true_answer% темы, это означает, что вы успешно освоили большую часть информации.";
            break;
        case 4:
            $text = "Вы хорошо разбираетесь в теме, молодец! Ваши знания составляют: $percent_true_answer%, почти идеально.";
            break;
        case 5:
            $text = "Вы отлично разбираетесь в теме. Вы верно ответили на $percent_true_answer% ответов. Курс был освоен идеально, поздравляю!";
            break;
    }
    echo "<p ALIGN='center'><b>Результаты теста</b></p>";
    $score_test = 0;
    if ($sum_true_answer <=2) { $score_test = 2; }
    else if ($sum_true_answer == 3) { $score_test = 3; }
    else if ($sum_true_answer == 4) { $score_test = 4; }
    else $score_test = 5;
    echo "<br><p ALIGN='center'><b>$name</b>, Ваша оценка за тест - $score_test</p>";
    echo "<br><p ALIGN='center'>$text</p>";
?>
</body>
</html>
