<?php
$GLOBALS['header'] = 3;
@include_once(__DIR__. '/start.php');
@include_once(__DIR__. '/top.php');

// TODO 

$curl = curl_init();


curl_setopt($curl, CURLOPT_URL, "https://github.com/user/repo/main/db.json");


curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$output = curl_exec($curl);
echo $output;

curl_close($curl);


@include_once(__DIR__. '/stop.php');