<?php

foreach ($_GET as $key => $value)
{
	$new_record = $_GET[$key] . ";" . $_GET[$key] . "\n";
    file_put_contents('list.csv', $new_record, FILE_APPEND | LOCK_EX);
}