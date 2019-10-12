<?php

$file = file_get_contents('list.csv');
$data = explode("\n", $file);
echo json_encode($data);