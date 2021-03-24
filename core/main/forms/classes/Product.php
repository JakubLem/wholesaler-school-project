<?php

require_once('Response.php');
require_once('Manufacturer.php');

class Product{
    public $identifier;

    public $product_name;
    public $product_quantity;
    public $product_display_price;
    public $product_netto_price;
    public $manufacturer;

    public function list_format() {
        $result = array(
            $this->manufacturer->manufacturer_name,
            $this->product_quantity,
            $this->product_display_price,
            $this->product_netto_price
        );
        return $result;
    }

    public function get_price() {
        return min($this->product_display_price, $this->product_netto_price);
    }
}


function get_all_products() {

    $sql_types = [];
    $query = 
    "
    SELECT p.product_id, p.product_name, p.product_quantity, p.product_display_price, p.product_netto_price, p.product_manufacturer_id, m.manufacturer_name
    FROM products p
    JOIN manufacturers m ON p.product_manufacturer_id = m.manufacturer_id
    GROUP BY p.product_id
    ";
    $db_result = $GLOBALS['database']->make_query($query, $sql_types);

    $result = array();

    foreach ($db_result as &$obj) {
        $product = new Product;
        $manufacturer = new Manufacturer;

        $product->identifier = $obj['product_id'];
        $product->product_name = $obj['product_name'];
        $product->product_quantity = $obj['product_quantity'];
        $product->product_display_price = $obj['product_display_price'];
        $product->product_netto_price = $obj['product_netto_price'];

        $manufacturer->manufacturer_id = $obj['product_manufacturer_id'];
        $manufacturer->manufacturer_name = $obj['manufacturer_name'];

        $product->manufacturer = $manufacturer;

        array_push($result, $product);
    }
    return $result;
}

function get_product_by_id($id) {
    $sql_types = ['id' => $id];
    $query = 
    "
    SELECT p.product_id, p.product_name, p.product_quantity, p.product_display_price, p.product_netto_price, p.product_manufacturer_id, m.manufacturer_name
    FROM products p
    JOIN manufacturers m ON p.product_manufacturer_id = m.manufacturer_id
    WHERE product_id = :id
    ";

    $db_result = $GLOBALS['database']->make_query($query, $sql_types);

    $product = new Product;
    $manufacturer = new Manufacturer;

    $obj = $db_result[0];

    $product->identifier = $obj['product_id'];
    $product->product_name = $obj['product_name'];
    $product->product_quantity = $obj['product_quantity'];
    $product->product_display_price = $obj['product_display_price'];
    $product->product_netto_price = $obj['product_netto_price'];
    $manufacturer->manufacturer_id = $obj['product_manufacturer_id'];
    $manufacturer->manufacturer_name = $obj['manufacturer_name'];

    $product->manufacturer = $manufacturer;

    return $product;
}
