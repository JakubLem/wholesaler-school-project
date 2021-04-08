<?php

require_once('Response.php');
require_once('Product.php');

class Cart{
    public $master_cart_id;
    public $user_id;
    public $product_id;
    public $quantity;

    public $product;
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
        $quantity = $obj['quantity'];

        $cart->master_cart_id = $master_cart_id;
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;
        $cart->quantity = $quantity;

        $cart->product = get_product_by_id($product_id);

        array_push($result, $cart);
    }

    return $result;
}

function clear_cart_by_user_id($user_id) {
    $sql_types = ['id' => $user_id];
    $query = "DELETE FROM cart WHERE user_id = :id";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
}
