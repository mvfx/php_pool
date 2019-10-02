#!/usr/bin/php
<?php
if ($argc > 1) {
	$result = trim(preg_replace('/\s\s+/', ' ', $argv[1]));
	echo $result . "\n";
}
?>