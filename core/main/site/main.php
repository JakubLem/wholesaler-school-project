<?php

print_r($_ENV);




@include_once(__DIR__. '/db_connector/db_connector.php');

$db = get_conn();

print($db->make_query("SELECT * FROM olejki"));
