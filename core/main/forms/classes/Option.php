<?php

class Option {
    public $max_weight;
    public $price;
}

function get_all_price_list_options($options_data) {
    // TODO WSP-43 validation
    $result = array();
    $price_list = $options_data['data']['pricelist']['options'];
    foreach ($price_list as &$option_data) {
        $option = new Option;
        $max_weight = $option_data['maxWeight'];
        $price = $option_data['price'];
        $option->max_weight = $max_weight;
        $option->price = $price;
        array_push($result, $option);
    }
    return $result;
}
