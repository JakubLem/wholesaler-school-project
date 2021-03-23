<?php

require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {

    $REQUIRED_FORM_FIELDS = array(
        'user_name',
        'user_surname',
        'user_email',
        'user_password_1',
        'user_password_2',
        'address_city',
        'address_postal_code',
        'address_address',
        'address_country',
        'user_firm_nip'
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {
        $null_array = check_null_values($post_data, $REQUIRED_FORM_FIELDS);
        if(count($null_array) != 0) {
            $_SESSION['register_ok'] = "INVALID";
            $_SESSION['response_code'] = 'null_values';
            $_SESSION['null_array'] = $null_array;
        } else {
            $user_name = $post_data['user_name'];
            $user_surname = $post_data['user_surname'];
            $user_email = $post_data['user_email'];
            $user_password_1 = $post_data['user_password_1'];
            $user_password_2 = $post_data['user_password_2'];
            $address_city = $post_data['address_city'];
            $address_postal_code = $post_data['address_postal_code'];
            $address_address = $post_data['address_address'];
            $address_country = $post_data['address_country'];
            $user_firm_nip = $post_data['user_firm_nip'];

            require_once('classes/User.php');

            $user = new User;
            
            $user->user_name = $user_name;
            $user->user_surname = $user_surname;
            $user->user_email = $user_email;
            $user->user_password_1 = $user_password_1;
            $user->user_password_2 = $user_password_2;
            $user->address_city = $address_city;
            $user->address_postal_code = $address_postal_code;
            $user->address_address = $address_address;
            $user->address_country = $address_country;
            $user->user_firm_nip = $user_firm_nip;
            

            $user->validate();
            
            if($user->last_response->status != 'INVALID'){
                $user->create();
                $_SESSION['response'] = $user->last_response;
                if($user->last_response->status == "OK") {
                    $_SESSION['register_ok'] = "OK";
                }
            } else {
                $_SESSION['register_ok'] = "INVALID";
                $_SESSION['response'] = $user->last_response;
                $_SESSION['response_code'] = 'EMAIL_EXISTS';
            }

            
        }
    } else {
        $_SESSION['register_ok'] = "INVALID";
        $_SESSION['response'] = $response_general;
        $_SESSION['response_code'] = 'none';
    }
    header("Location: ../account.php");
}

run_form($_POST);
