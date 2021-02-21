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
/*
function user_create_validation($post_data) {
    $response = new Response();
    return $response;
}
*/