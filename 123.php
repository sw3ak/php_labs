<?php
$urls = [
    "www.mail.ru/session=18&lang=ru",
    "www.google.com/session=256&lang=en",
    "www.sibsutis.ru/session=22&lang=esp",
    "jedjwasj.kxas/session=18&lang=ru",
];

$pattern = '/(www+.*\bsession=(\d+)&lang=([a-z]{2,3}))/';

foreach ($urls as $url) {
    if (preg_match($pattern, $url, $matches)) {
        echo "true\n";
    } else {
        echo "No match for URL: $url";
    }
}
?>