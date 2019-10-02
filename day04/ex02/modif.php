<?php

$password_file_name = 'passwd';
$password_path = '../private';
$password_file_path = "{$password_path}/{$password_file_name}";

function create_file($password_path, $password_file_path)
{
    // Create folder if not exist
    if (!file_exists($password_path)) {
        mkdir($password_path);
    }

    // Create file if not exist
    if (!file_exists($password_file_path)) {
        file_put_contents($password_file_path, '');
    }
}

function is_user_valid($login, $pass, $data)
{
    foreach ($data as $key => $record)
    {
        if ($record['login'] === $login && $record['passwd'] === hash('whirlpool', $pass))
        {
            return true;
        }
    }
    return false;
}

if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] === "OK")
{

    create_file($password_path, $password_file_path);

    $data = unserialize(file_get_contents($password_file_path));

    $is_valid = is_user_valid($_POST['login'], $_POST['oldpw'], $data);

    if (!$is_valid) {
        echo "ERROR\n";
    } else {

        foreach ($data as $key => $value) {
            if ($value['login'] === $_POST['login'])
            {
                $data[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
                break;
            }
        }
        file_put_contents($password_file_path, serialize($data));
        echo "OK\n";
    }
} else {
    echo "ERROR\n";
}