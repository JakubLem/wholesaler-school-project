<?php

require_once('connect_db.php');
require_once('forms/session/start.php');


if(isset($_GET['id']) && isset($_SESSION['user_identifier'])){
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_identifier'];

    $sql_types = ['id' => $user_id];
    $query = "SELECT * FROM cart WHERE user_id = :id";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);

    if(empty($db_result)){
        $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (".$user_id.", ".$product_id.", 1);";
        $db_result = $GLOBALS['database']->make_query($query, []);
    } else {
        $master_cart_id = 0;
        $new_quantity = 0;

        foreach ($db_result as &$obj) {            
            if($user_id == $obj['user_id']) {
                if($product_id == $obj['product_id']) {
                    $master_cart_id = $obj['master_cart_id'];
                    $new_quantity = $obj['quantity'] + 1;
                }
            }  
        }

        if($master_cart_id != 0 && $new_quantity != 0) {
            $query = "UPDATE cart SET quantity = ".$new_quantity." WHERE master_cart_id = ".$master_cart_id.";";
            $db_result = $GLOBALS['database']->make_query($query, []);
        } else {
            $query = "INSERT INTO cart (user_id, product_id, quantity) VALUES (".$user_id.", ".$product_id.", 1);";
            $db_result = $GLOBALS['database']->make_query($query, []);
        }
    }
}

header("Location: products.php");
