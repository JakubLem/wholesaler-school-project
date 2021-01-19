<?php

print_r($_ENV);

@include_once('../db_connector/db_connector.php');
$db = get_conn();

echo $db->$valid;
