<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hurtowo</title>
    <link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/main.css">
</head>
<body>
<?php
include_once('../../vendor/autoload.php');
    
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$GLOBALS['env'] = $_ENV;

@include_once('db_connector/myDatabase.php');

$GLOBALS['database'] = new MyDatabase;
$GLOBALS['database']->get_connection();

@include_once(__DIR__. '/header.php');
?>
