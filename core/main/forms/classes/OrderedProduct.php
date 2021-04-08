<?php
class OrderedProduct {
    public $identifier;

    public $product_identifier;
    public $product_name;
    public $product_price;
    public $manufacturer;

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
                'manufacturer_id' => $this->manufacturer->identifier,
                'ordered_quantity' => $this->ordered_quantity
            ];
            $query = 
            "
            INSERT INTO orderedproducts
            (order_id, product_id, product_name, product_price, manufacturer_id, ordered_quantity)
            VALUES(:order_id, :product_id, :product_name, :product_price, :manufacturer_id, :ordered_quantity)
            ";

        }
    }

    public function set_ordered_product($product_identifier, $product_name, $product_price, $product_manufacturer, $ordered_quantity, $order_id) {
        $this->product_identifier = $product_identifier;
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->manufacturer = $product_manufacturer;
        $this->ordered_quantity = $ordered_quantity;
        $this->order_id = $order_id;
        $this->is_set = true;
    }
    
}
?>
