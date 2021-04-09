<?php

require_once('Cart.php');
require_once('OrderedProduct.php');
require_once('User.php');

class Order {
    public $identifier;
    public $user_id;
    public $ordered_products;

    public $status;

    public $order_sum_cost;
    public $order_transport_cost;

    function get_user() {
        return get_user_by_id($this->user_id);
    }

    private function create_order() {
        $sql_types = [
            'user_id' => $this->user_id
        ];
        $query = 
        '
        INSERT INTO orders 
        (user_id, order_sum_cost, order_transport_cost, order_status)
        VALUES(:user_id, 0, 0, "W trakcie przygotowania")
        ';

        $result = $GLOBALS['database']->make_query($query, $sql_types);
        return $GLOBALS['database']->get_last_insert();
    }

    public function make_order($user_id) {
        $this->user_id = $user_id;
        $this->identifier = $this->create_order();

        $order_sum_cost = 0.0; 

        $products = get_product_identifiers_from_user_cart($this->user_id);
        foreach ($products as &$cart) {
            $op = new OrderedProduct;

            $product_identifier = $cart->product->identifier;
            $product_name = $cart->product->product_name;
            $product_price = $cart->product->get_price();
            $product_manufacturer_id = $cart->product->manufacturer->manufacturer_id;
            $ordered_quantity = $cart->quantity;

            $op->set_ordered_product(
                $product_identifier,
                $product_name,
                $product_price,
                $product_manufacturer_id,
                $ordered_quantity,
                $this->identifier
            );
            $op->add();

            $order_sum_cost = $order_sum_cost + $op->get_full_price();
        }

        $sql_types = [
            'id' => $this->identifier,
            'order_sum_cost' => $order_sum_cost
        ];
        $query = 
        "
        UPDATE orders
        SET order_sum_cost = :order_sum_cost
        WHERE order_id = :id
        ";
        $db_result = $GLOBALS['database']->make_query($query, $sql_types);
        clear_cart_by_user_id($this->user_id);
        $_SESSION['cart_message'] = "Zamówienie zostało złożone pomyślnie!";
    }
}

function get_orders_by_db_result($db_result) {
    $result = array();
    foreach ($db_result as &$obj) {
        $order = new Order;

        $identifier = $obj['order_id'];
        $user_id = $obj['user_id'];
        $status = $obj['order_status'];
        $order_sum_cost = $obj['order_sum_cost'];
        $order_transport_cost = $obj['order_transport_cost'];
        $ordered_products = get_ordered_producs_by_order_id($identifier);
        
        $order->identifier = $identifier;
        $order->user_id = $user_id;
        $order->status = $status;
        $order->order_sum_cost = $order_sum_cost;
        $order->order_transport_cost = $order_transport_cost;
        $order->ordered_products = $ordered_products;

        array_push($result, $order);
    }
    return $result;

}

function get_orders_by_user_id($user_id) {
    $sql_types = [
        'id' => $user_id
    ];
    $query = "SELECT * FROM orders WHERE user_id = :id";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
    return get_orders_by_db_result($db_result);
}

function order_user_check($user_id, $order_id) {
    return true;
}

function get_order_by_order_id($order_id) {
    $sql_types = [
        'id' => $order_id
    ];
    $query = "SELECT * FROM orders WHERE order_id = :id";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
    return get_orders_by_db_result($db_result)[0];
}

function get_all_orders() {
    $sql_types = [];
    $query = "SELECT * FROM orders";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
    return get_orders_by_db_result($db_result);
}

function update_status($order_id, $new_status) {
    $sql_types = [
        'status' => $new_status,
        'order_id' => $order_id
    ];
    $query = "
    UPDATE orders
    SET order_status = :status
    WHERE order_id = :order_id
    ";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
}

?>
