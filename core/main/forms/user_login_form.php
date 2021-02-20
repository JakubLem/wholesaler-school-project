<?php

require_once('validators.php');
require_once('../connect_db.php');
require_once('session/start.php');


function run_form($post_data) {
    $REQUIRED_FORM_FIELDS = array(
        'user_email',
        'user_password',
    );

    $response_general = general_form_validation($post_data, $REQUIRED_FORM_FIELDS);

    if($response_general->status != 'INVALID') {

        $user_email = $post_data['user_email'];
        $user_password = $post_data['user_password'];

        require_once('classes/User.php');

        $user = new User;

        $user->user_email = $user_email;
        $user->user_password_1 = $user_password;

        if($user->last_response->status == "OK") {
            $_SESSION['login'] = "OK";
            $user->update_data();
            $_SESSION['user'] = $user;
        }

        $_SESSION['login'] = $user->login();

    }

    header("Location: ../account.php");
}

run_form($_POST);
