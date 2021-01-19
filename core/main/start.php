<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtowo</title>
    <link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/main.css">
</head>
<body>
start
<?php
@include_once('db_connector/db_connector.php');

$db = new MyDatabase($dbsname, $dbusername, $dbpassword, $dbname);
$db->check_valid();

@include_once(__DIR__. '/header.php');


$db->make_query("SELECT * FROM olejki");
$result = $db->get_last_response();
echo var_dump($result);
if(var_dump($result) != false) {
    while($row = $result->fetch_assoc()) {
        print_r($row);
        echo "<br>";
    }
    $db->last_response->free_result();
    $result->free_result();
    unset($result);
}

