<?php

require_once('Response.php');


class Cart{
    public $master_cart_id;
    public $user_id;
    public $product_id;
}


function get_product_identifiers_from_user_cart($user_id) {
    $sql_types = ['id' => $user_id];
    $query = "SELECT * FROM cart WHERE user_id = :id";

    $db_result = $GLOBALS['database']->make_query($query, $sql_types);

    $result = array();

    foreach ($db_result as &$obj) {
        $cart = new Cart;

        $master_cart_id = $obj['master_cart_id'];
        $user_id = $obj['user_id'];
        $product_id = $obj['product_id'];

        $cart->master_cart_id = $master_cart_id;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;

        array_push($result, $cart);
    }

    return $result;
}