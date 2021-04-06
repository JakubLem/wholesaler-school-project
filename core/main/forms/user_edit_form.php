<?php

require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {
    $REQUIRED_FORM_FIELDS = array(
        'user_name',
        'user_surname',
        'address_address',
        'address_postal_code',
        'address_city',
        'address_country',
        'user_firm_nip'
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {

        $user_email = $_SESSION['account_view']["Adres e-mail"];

        require_once('classes/User.php');

        $user = new User;

        $user_name = $post_data['user_name'];
        $user_surname = $post_data['user_surname'];
        $address_city = $post_data['address_city'];
        $address_postal_code = $post_data['address_postal_code'];
        $address_address = $post_data['address_address'];
        $address_country = $post_data['address_country'];
        $user_firm_nip = $post_data['user_firm_nip'];

        $user->user_name = $user_name;
        $user->user_surname = $user_surname;
        $user->address_city = $address_city;
        $user->address_postal_code = $address_postal_code;
        $user->address_address = $address_address;
        $user->address_country = $address_country;
        $user->user_firm_nip = $user_firm_nip;

        if($user->update_user_data($user_email)) {
            $_SESSION['change_user_data_status'] = "OK";
            $_SESSION['user_name'] = $user->user_name;
            $_SESSION['user_identifier'] = $user->identifier;
            // TODO WSP-33 replace all user values into account_view
            $_SESSION['account_view'] = $user->account_view();
        }

        
    } else {
        $_SESSION['change_user_data_status'] = "INVALID";
        $_SESSION['change_user_data_code'] = "VALIDATION_ERROR";
    }
    header("Location: ../account.php");
}

run_form($_POST);
