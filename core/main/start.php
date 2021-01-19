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

$db = get_db();
$db->get_connection();

@include_once(__DIR__. '/header.php');