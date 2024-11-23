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
    $align = isset($_POST['align']) ? $_POST['align'] : 'left';
    $valign_array = isset($_POST['valign']) ? $_POST['valign'] : [];
    $valign = '';
    if (!empty($valign_array)) {
        $valign = $valign_array[0];
    } else {
        $valign = 'top';
    }
?>
    <table border="1" width="300" height="300">
        <tr>
            <td align="<?php echo htmlspecialchars($align); ?>" valign="<?php echo htmlspecialchars($valign); ?>">
                тут
            </td>
        </tr>
    </table>
    <br>
    <a href="4a.html">Назад</a>
</body>
</html>
