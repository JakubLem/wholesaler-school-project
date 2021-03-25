<?php

require_once('connect_db.php');
require_once('forms/session/start.php');


if(isset($_GET['master_cart_id']) && isset($_SESSION['user_identifier'])){
    $master_cart_id = $_GET['master_cart_id'];
    $user_id = $_SESSION['user_identifier'];

    $sql_types = ['id' => $user_id, 'mci' => $master_cart_id];
    $query = "SELECT * FROM cart WHERE user_id = :id AND master_cart_id = :mci";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);

    print_r($db_result);

    foreach ($db_result as &$obj) {         
        if($user_id == $obj['user_id']) {
            if($master_cart_id == $obj['master_cart_id']) {
                $new_quantity = $obj['quantity'] - 1;
            }
        }
    }

    $query = "UPDATE cart SET quantity = ".$new_quantity." WHERE master_cart_id = ".$master_cart_id.";";
    $db_result = $GLOBALS['database']->make_query($query, []);

}

$_SESSION['cart_important'] = true; // TODO WSP-36
header("Location: account.php");