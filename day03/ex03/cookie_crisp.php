<?php

if ($_GET['action'] && $_GET['name'])
{
    if ($_GET['action'] == 'set')
    {
        $value = $_GET['value'] ? $_GET['value'] : '';
        setcookie($_GET['name'], $value, time() + 60 * 60 * 24);
    }
    elseif ($_GET['action'] == 'get')
    {
        if ($_COOKIE[$_GET['name']])
            echo $_COOKIE[$_GET['name']] . "\n";
    }
    elseif ($_GET['action'] == 'del')
    {
        setcookie($_GET['name'], NULL, -1);
    }
}
