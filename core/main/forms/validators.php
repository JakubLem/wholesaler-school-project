<?php

require_once('classes/Response.php');


function general_form_validation($post_data, $required_data) {
    $response = new Response();
    foreach ($required_data as &$value) {
        if(!array_key_exists($value, $post_data)) {
            $response->set_status('INVALID');
            return $response;
        }
    }
    return $response;
}


function check_null_values($post_data, $required_data) {
    $null_array = array();
    foreach ($required_data as &$value) {
        if(empty($post_data[$value])) {
            echo "testtest";
            array_push($null_array, $value);
        }
    }
    return $null_array;
}
