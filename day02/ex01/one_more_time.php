#!/usr/bin/php
<?php

function array_to_lowercase($value)
{
    return strtolower($value);
}

function parse_date($str)
{
    date_default_timezone_set("Europe/Paris");

    $str_date = $str;

	$week_days = array("dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi");
    $months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");


    $week_days_en = array('sun' , 'mon' , 'tue' , 'wed' , 'thu' , 'fri' , 'sat');
    $month_en = array('jan' , 'feb' , 'mar' , 'apr' , 'may' , 'jun' , 'jul' , 'aug' , 'sep', 'oct' , 'nov' , 'dec' );
	$data_parts = array_filter(explode(" ", $str_date));
    $data_parts = array_map(array_to_lowercase, $data_parts);


    if (sizeof($data_parts) === 5)
	{
	    $week_day = $data_parts[0];
	    $day = $data_parts[1];
        $month = $data_parts[2];
        $year = $data_parts[3];
        $time = $data_parts[4];

	    if (!in_array($week_day, $week_days)) {
            return -1;
        } else {
            $week_day = array_search($week_day, $week_days);
        }


	    if (!in_array($month, $months)) {
            return -1;
        } else {
            $month = array_search($month, $months);
        }

        $string = "{$week_days_en[$week_day]}, {$day} {$month_en[$month]} {$year} {$time}";
        $time = strtotime($string);

        return $time;
    }

	return -1;
}


if ($argc == 2) {
	if (parse_date($argv[1]) >= 0)
	{
		echo parse_date($argv[1])."\n";
	}
	else
	{
		echo "Wrong Format\n";
	}
}
?>