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
/*
$GLOBALS['database'] = mysqli_connect(
    $dbsname, 
    $dbusername, 
    $dbpassword, 
    $dbname
);


$result = $GLOBALS['database']->query($sql_request);
*/




@include_once('db_connector/myDatabase.php');
$GLOBALS['database'] = new MyDatabase;
$GLOBALS['database']->get_connection();
//$db = new MyDatabase($dbsname, $dbusername, $dbpassword, $dbname);
//$db->check_valid();

@include_once(__DIR__. '/header.php');


//$db->make_query("SELECT * FROM olejki");
//$result = $db->get_last_response();
//echo var_dump($result);
// $sql_request = "SELECT * FROM olejki";
$sqlTypes = ['IDOlejku' => 1];
$query = 'SELECT * FROM olejki.olejki';
$result = $GLOBALS['database']->make_query($query, $sqlTypes);
// $result = $GLOBALS['database']->get_last_response();
foreach($result as $row) {
    print_r($row);
}
//    $db->last_response->free_result();
//    $result->free_result();
//    unset($result);


