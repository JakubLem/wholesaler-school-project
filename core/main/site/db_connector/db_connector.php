<?php

@include_once('myDatabase.php');

function get_db() {
    $dbsname = $_ENV["DATABASE_NAME"];
    $dbusername = $_ENV["DBUSERNAME"];
    $dbpassword = $_ENV["DBPASSWORD"];
    $dbname = $_ENV["DBNAME"];
    $db = new MyDatabase($dbsname, $dbusername, $dbpassword, $dbname);
    return $db;
}
