<?php

function auth($login, $pass)
{
    $file_path = '../private/passwd';

    if (!$login || !$pass)
    {
        return false;
    }

    $user = unserialize(file_get_contents($file_path));

    foreach ($user as $key => $value)
    {
        if ($value['login'] == $login && $value['passwd'] == hash("whirlpool", $pass))
        {
            return true;
        }
    }

    return false;
}
