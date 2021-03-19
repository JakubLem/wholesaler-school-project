<?php

require_once('Response.php');

class Product{
    public $identifier;

    public $product_name;
    public $product_quantity;
    public $product_display_price;
    public $product_netto_price;
    public $manufacturer;
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
    $result = $GLOBALS['database']->make_query($query, $sql_types);
    return $result;

}