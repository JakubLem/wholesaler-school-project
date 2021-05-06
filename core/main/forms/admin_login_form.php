<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {
    $REQUIRED_FORM_FIELDS = array(
        'login_user_email',
        'login_user_password',
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {

        $admin_email = $post_data['login_user_email'];
        $admin_password = $post_data['login_user_password'];

        require_once('classes/Admin.php');

        $admin = new Admin;

        $admin->admin_email = $admin_email;
        $admin->admin_password_1 = $admin_password;

        $admin->login();

        if($admin->last_response->status == "OK") {

            if($admin->update_data()) {
                $_SESSION['admin-login'] = "OK";
                $_SESSION['admin_name'] = $admin->admin_name;
                $_SESSION['admin_identifier'] = $admin->identifier;
                header("Location: ../admin-panel.php");
            } else {
                $_SESSION['admin_login'] = "INVALID";
            }
        } else {
            $_SESSION['admin_login'] = "INVALID";
        }
        $_SESSION['response_code'] = $admin->last_response->code;
        if(isset($_SESSION['admin-login'])){
            header("Location: ../admin-panel.php");
        }
    }
    if(isset($_SESSION['admin-login'])){
        header("Location: ../admin-panel.php");
    }
    header("Location: ../admin.php");
}

run_form($_POST);
