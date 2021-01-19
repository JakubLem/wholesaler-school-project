<?php

print_r($_ENV);

@include_once(__DIR__. '/db_connector/db_connector.php');

$db = get_db();
$GLOBALS['db'] = $db;

@include_once(__DIR__. '/sites/start.php');
@include_once(__DIR__. '/sites/stop.php');
