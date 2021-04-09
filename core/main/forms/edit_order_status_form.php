<?php

require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');
require_once('classes/Order.php');


function run_form($post_data) {
    $REQUIRED_FORM_FIELDS = array(
        'new_status'
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {
        $new_status = $post_data['new_status'];
        $order_id = $_SESSION['order_id'];
        update_status($order_id, $new_status);
    }
    header("Location: ../admin_orders.php");
}

run_form($_POST);
