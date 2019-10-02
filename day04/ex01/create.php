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

function is_login_exist($login, $data)
{
    foreach ($data as $key => $record)
    {
        if ($record['login'] === $login) {
            return true;
        }
    }
    return false;
}

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "OK")
{

    create_file($password_path, $password_file_path);

    $data = unserialize(file_get_contents($password_file_path));

    $is_exist = is_login_exist($_POST['login'], $data);

    if ($is_exist) {
        echo "ERROR\n";
    } else {
        $data[] = array(
            'login' => $_POST['login'],
            'passwd' => hash('whirlpool', $_POST['passwd'])
        );

        file_put_contents($password_file_path, serialize($data));
        echo "OK\n";
    }
} else {
    echo "ERROR\n";
}