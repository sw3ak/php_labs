<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$city = $_POST['city'];
$address = $_POST['address'];
$birthday = $_POST['birthday'];
$mail = $_POST['mail'];

if (preg_match('/^[a-zA-Z0-9]+$/i', $mail)) {
    echo "Error. Rename please.";
}

else if (preg_match('/^[a-zA-Z0-9]+$/i', $name)) {
    echo "Error. Rename please.";
}
else {
    $sql = "INSERT INTO notebook_br01 (name, address, city, birthday, mail)
        VALUES ('$name', '$address', '$city', '$birthday', '$mail')";

    if ($conn->query($sql) === TRUE) {
        echo "Thank you! New data has been added to the database.";
    }
}


?>