<?php
$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/(Firefox\/[^\s]+)/', $userAgent, $matches)) {
    $browser = "Браузер: Firefox (" . $matches[1] . ")";
} elseif (preg_match('/(Chrome\/[^\s]+)/', $userAgent, $matches)) {
    $browser = "Браузер: Chrome (" . $matches[1] . ")";
} else {
    $browser = "Браузер: Неизвестен";
}

if (preg_match('/Windows NT 10.0/', $userAgent)) {
    $os = "ОС: Windows 10";
} elseif (preg_match('/Mac OS X/', $userAgent)) {
    $os = "ОС: macOS";
} elseif (preg_match('/Linux/', $userAgent)) {
    $os = "ОС: Linux";
} else {
    $os = "ОС: Неизвестна";
}

echo "<p>$browser</p>";
echo "<p>$os</p>";

?>