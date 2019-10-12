<?php

foreach ($_GET as $key => $value)
{
    $file = file_get_contents('list.csv');

    $data = explode("\n", $file);

    foreach ($data as $record)
    {
        $tmp = explode(";", $record);
        if ($tmp[1] == $value)
        {
            $line = $tmp[1] . ";" . $tmp[1] . "\n";
            $file = str_replace($line, '', $file);
            file_put_contents('list.csv', $file);
        }
    }
}