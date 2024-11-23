<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$fileName = "notebook_br01.txt";
date_default_timezone_set('Asia/Novosibirsk');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (file_exists($fileName)) {
    $fileArray = file($fileName, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo '<table border="1" cellpadding="25">';
    foreach ($fileArray as $line) {
        $line = rtrim($line, "| \n");
        $line = preg_replace('/\|/', '</td><td>', $line);
        $line = preg_replace('/([^\s]+@[^\s]+)/', '<a href="mailto:$1">$1</a>', $line);
        echo "<tr><td>$line</td></tr>";
    }
    echo '</table>';
    $modificationTime = date("Y-m-d H:i:s", filemtime($fileName));
    echo "Последняя модификация файла: $modificationTime";
} else {
    echo "Файл не найден.";
}

$conn->close();
?>