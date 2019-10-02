#!/usr/bin/php
<?php

if ($argc != 2)
    return;

$str = @file_get_contents($argv[1]);
echo preg_replace_callback("/<a.*?\/a>/si", function($match) {
    return preg_replace_callback(
        "/(?<=title=\").*?\"|>.*?</si",
        function($match) {
            return (strtoupper($match[0]));
        },
        $match[0]
    );
}, $str);

