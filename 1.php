<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$fileName = "notebook_br01.txt";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (file_exists($fileName)) {
    echo "Файл существует<br>";
} else {
    $fileHandle = fopen($fileName, "w");
    if (!$fileHandle) {
        die("Не удалось создать файл.");
    }
    fclose($fileHandle);
}

$fileHandle = fopen($fileName, "w");
if (!$fileHandle) {
    die("Не удалось открыть файл на запись.");
}
$query = "SELECT * FROM notebook_br01";
$result = $conn->query($query);
if (!$result) {
    die("Ошибка выполнения запроса: " . $conn->error);
}
while ($row = $result->fetch_assoc()) {
    $line = [];
    foreach ($row as $column) {
        $column = preg_replace('/(\d{4})-(\d{2})-(\d{2})/', '$3-$2-$1', $column);
        $line[] = $column;
    }
    fwrite($fileHandle, implode(" | ", $line) . "\n");
}
fclose($fileHandle);

$fileHandle = fopen($fileName, "r");
if (!$fileHandle) {
    die("Не удалось открыть файл на чтение.");
}
while (($line = fgets($fileHandle)) !== false) {
    echo nl2br(htmlspecialchars($line));
}
fclose($fileHandle);

$conn->close();
?>