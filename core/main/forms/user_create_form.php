<?php






require_once('validators.php');
require_once('../connect_db.php');

$query = 'SELECT * FROM users';
$result = $GLOBALS['database']->make_query($query, []);

foreach($result as $row) {
    print_r($row);
}

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

    // if($response_general->status == 'INVALID') {
    if(TRUE) {

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

        $user = new UserCreate(
            $user_name,
            $user_surname,
            $user_email,
            $user_password_1,
            $user_password_2,
            $address_city,
            $address_postal_code,
            $address_address,
            $address_country,
            $user_firm_nip
        );

        $user->validate();

        // if($user->validation_status) {
        //     $user->create();
        // }
        $user->create();
        $GLOBALS['response'] = $user->last_response;
    } else {
        $GLOBALS['response'] = $response_general;
    }
    // header("Location: ../account.php");
}

run_form($_POST);
