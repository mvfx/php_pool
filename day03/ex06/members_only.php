<?php

$login = 'zaz';
$pass = 'jaimelespetitsponeys';

$image_path = "../img/42.png";

header('Content-Type: text/html');

if ($_SERVER['PHP_AUTH_USER'] === $login && $_SERVER['PHP_AUTH_PW'] === $pass) {

    $image_content = file_get_contents($image_path);
    $base64_image = base64_encode($image_content);

    echo "<html><body>Hello Zaz<br/>\n<img src='data:image/png;base64,";
    echo ($base64_image);
    echo "'>\n</body></html>\n";
}
else
{
    header('WWW-Authenticate: Basic realm="Member area"');
    header('HTTP/1.0 401 Unauthorized');
    echo "<html><body>That area is accessible for members only</body></html>\n";
}