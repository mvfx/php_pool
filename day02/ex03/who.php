#!/usr/bin/php
<?php

$USER_PROCESS = 7;
$RECORD_SIZE = 628;
$utmpx_path = '/var/run/utmpx';


if ($fd = fopen($utmpx_path, "r")) {

    while ($line = fread($fd, $RECORD_SIZE))
    {
        $record = unpack("a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad", $line);
        if ($record['type'] == $USER_PROCESS)
        {
            $date = date("M  j H:i", $record['time1']);

            echo "{$record['user']} {$record['line']}  {$date}\n";
        }
    }

}
