<?php

require_once('Cart.php');

class Order {
    public $identifier;
    public $user_id;
    public $ordered_products;
    public $status;

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
        $order_id = $this->create_order();

        $products = get_product_identifiers_from_user_cart($this->user_id);


        

        echo $order_id;
    }
}
?>
