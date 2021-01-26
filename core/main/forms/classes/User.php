<?php

require_once('classes/Response.php');

class UserCreate{
    public $user_name;
    public $user_surname;
    public $user_email;
    public $user_password_1;
    public $user_password_2;
    public $address_city;
    public $address_postal_code;
    public $address_address;
    public $address_country;
    public $user_firm_nip;

    public $validate_status = FALSE;
    public $last_response;

    public function __construct(
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
    )   
    {
        $this->user_name = $user_name;
        $this->user_surname = $user_surname;
        $this->user_email = $user_email;
        $this->user_password_1 = $user_password_1;
        $this->user_password_2 = $user_password_2;
        $this->address_city = $address_city;
        $this->address_postal_code = $address_postal_code;
        $this->address_address = $address_address;
        $this->address_country = $address_country;
        $this->user_firm_nip = $user_firm_nip;
    }

    public function validate() {
        $this->validate_status = TRUE;
    }


    public function create() {
        if($validate_status){

        } else {

        }
    }
}