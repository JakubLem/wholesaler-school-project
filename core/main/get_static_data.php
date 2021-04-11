<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
require_once('connect_db.php');
require_once('forms/session/start.php');

function get_value_by_key($key) {
    $sql_types = [
        'key' => $key
    ];
    $query = "SELECT * FROM staticdata WHERE static_data_key = :key";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
    return $db_result[0]['static_data_value'];
}
