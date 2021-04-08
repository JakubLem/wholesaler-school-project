<?php
class OrderedProduct {
    public $identifier;

    public $product_identifier;
    public $product_name;
    public $product_price;
    public $manufacturer_id;

    public $ordered_quantity;
    public $order_id;

    private $is_set = false;

    public function add() {
        if($this->is_set) {
            $sql_types = [
                'order_id' => $this->order_id,
                'product_id' => $this->product_identifier,
                'product_name' => $this->product_name,
                'product_price' => $this->product_price,
                'manufacturer_id' => $this->manufacturer_id,
                'ordered_quantity' => $this->ordered_quantity
            ];
            $query = 
            "
            INSERT INTO orderedproducts
            (order_id, product_id, product_name, product_price, manufacturer_id, ordered_quantity)
            VALUES(:order_id, :product_id, :product_name, :product_price, :manufacturer_id, :ordered_quantity)
            ";
            $db_result = $GLOBALS['database']->make_query($query, $sql_types);
            return true;
        }
    }

    public function set_ordered_product($product_identifier, $product_name, $product_price, $product_manufacturer_id, $ordered_quantity, $order_id) {
        $this->product_identifier = $product_identifier;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->manufacturer_id = $product_manufacturer_id;
        $this->ordered_quantity = $ordered_quantity;
        $this->order_id = $order_id;
        $this->is_set = true;
    }

    public function get_full_price() {
        return $this->product_price*$this->ordered_quantity;
    }
}

function translate_db_result($db_result) {
    $result = array();
    foreach ($db_result as &$obj) {
        $op = new OrderedProduct;
        $op->product_identifier = $obj['product_id'];
        $op->product_name = $obj['product_name'];
        $op->product_price = $obj['product_price'];
        $op->manufacturer_id = $obj['manufacturer_id'];
        $op->ordered_quantity = $obj['ordered_quantity'];
        $op->order_id = $obj['order_id'];

        array_push($result, $op);
    }
    return $result;

}

function get_ordered_producs_by_order_id($order_id) {
    $sql_types = [
        'id' => $order_id
    ];
    $query = "SELECT * FROM orderedproducts WHERE order_id = :id";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
    return translate_db_result($db_result);
}

?>
