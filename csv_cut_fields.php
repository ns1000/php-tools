<?php
error_reporting(E_ALL ^ E_NOTICE);
$fields = explode(",", $argv[2]);
$fp = fopen($argv[1], "r");
$out = fopen("php://stdout", "w");
$arr = fgetcsv($fp);
$j = 0;
foreach($fields as $field)
{
        $csvout[$j++] = $arr[$field];
}

fputcsv($out, $csvout);
while($arr = fgetcsv($fp))
{
	$csvout = array();
	foreach($fields as $field)
	{
		$csvout[$j++] = $arr[$field];
	}
	fputcsv($out, $csvout);
}
