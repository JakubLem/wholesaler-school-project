<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {

    $REQUIRED_FORM_FIELDS = array(
        'user_name',
        'user_surname',
        'user_email',
        'user_password_1',
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {
        $null_array = check_null_values($post_data, $REQUIRED_FORM_FIELDS);
        if(count($null_array) != 0) {
            $_SESSION['register_ok'] = "INVALID";
            $_SESSION['response_code'] = 'null_values';
            $_SESSION['null_array'] = $null_array;
        } else if ($post_data['user_password_1'] != $post_data['user_password_2']) {
            $_SESSION['register_ok'] = "INVALID";
            $_SESSION['response_code'] = 'invalid_passwords';
            header("Location: ../admin.php");
        } else {
            $admin_name = $post_data['user_name'];
            $admin_surname = $post_data['user_surname'];
            $admin_email = $post_data['user_email'];
            $admin_password_1 = $post_data['user_password_1'];

            require_once('classes/Admin.php');

            $admin = new Admin;
            
            $admin->admin_name = $admin_name;
            $admin->admin_surname = $admin_surname;
            $admin->admin_email = $admin_email;
            $admin->admin_password_1 = $admin_password_1;
            

            $admin->validate();
            
            if($admin->last_response->status != 'INVALID'){
                $admin->create();
                $_SESSION['response'] = $admin->last_response;
                if($admin->last_response->status == "OK") {
                    $_SESSION['register_ok'] = "OK";
                }
            } else {
                $_SESSION['register_ok'] = "INVALID";
                $_SESSION['response'] = $admin->last_response;
                $_SESSION['response_code'] = 'EMAIL_EXISTS';
            }

            
        }
    } else {
        $_SESSION['register_ok'] = "INVALID";
        $_SESSION['response'] = $response_general;
        $_SESSION['response_code'] = 'none';
    }
    header("Location: ../admin.php");
}

run_form($_POST);
