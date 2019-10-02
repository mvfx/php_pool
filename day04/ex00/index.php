<?php

header("Content-Type: text/html");

session_start();
if ($_GET['submit'] === "OK")
{
    $_SESSION['login'] = $_GET['login'];
    $_SESSION['passwd'] = $_GET['passwd'];
}

$login = isset($_SESSION['login']) ? $_SESSION['login'] : '';
$pass = isset($_SESSION['passwd']) ? $_SESSION['passwd'] : '';

?>

<html><body>
<form method="GET" action="index.php">
    Username: <input type="text" name="login" value="<?= $login;?>" />
    <br />
    Password: <input type="password" name="passwd" value="<?= $pass;?>" />
    <input type="submit" name="submit" value="OK" />
</form>
</body></html>