<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
@include_once('db_connector/myDatabase.php');

$GLOBALS['database'] = new MyDatabase;
$GLOBALS['database']->get_connection($GLOBALS['env']);
