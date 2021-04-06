<?php

require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {
    $REQUIRED_FORM_FIELDS = array(
        'user_old_password',
        'user_new_password',
        'user_new_password_re'
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {



        $user_email = $_SESSION['account_view']["Adres e-mail"];
        $user_password = $post_data['user_old_password'];

        require_once('classes/User.php');

        $user = new User;

        $user->user_email = $user_email;
        $user->user_password_1 = $user_password;

        $user->login();

        if($user->last_response->status == "OK") {
            $user_new_password = $post_data['user_new_password'];
            $user_new_password_re = $post_data['user_new_password_re'];

            if($user_new_password != $user_new_password_re) {
                $_SESSION['change_data_status'] = "INVALID";
                $_SESSION['change_data_code'] = 'invalid_passwords';
            } else {
                if($user->change_password($user_new_password)) {
                    $_SESSION['change_data_status'] = "OK";
                } else {
                    $_SESSION['change_data_status'] = "INVALID";
                    $_SESSION['change_data_code'] = "OTHER"; 
                }

            }

        } else {
            $_SESSION['change_data_status'] = "INVALID";
            $_SESSION['change_data_code'] = "INVALID_OLD_PASSWORD"; 
        }
    } else {
        $_SESSION['change_data_status'] = "INVALID";
        $_SESSION['change_data_code'] = "VALIDATION_ERROR";
    }

    header("Location: ../account.php");
}

run_form($_POST);
