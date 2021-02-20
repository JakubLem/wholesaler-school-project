<?php

require_once('Response.php');
require_once('Address.php');

class User{
    public $identifier;

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

    /*
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
    */

    public function login() {
        $response = new Response();

        $sql_types = ['email' => $this->user_email];
        $query = "SELECT user_id, user_password FROM users WHERE user_email = :email";

        $result = $GLOBALS['database']->make_query($query, $sql_types);

        if(empty($result)) {
            $response->set_invalid();
        } else {
            if(password_verify($this->user_password_1, $result['user_password'])){
                $this->identifier = $result['user_id'];
            } else {
                $response->set_invalid();
            }
        }

        return $response;
    }

    public function update_data() {
        $sql_types = ['email' => $this->user_email];
        $query = "SELECT user_id, user_password FROM users WHERE user_email = :email";
    }

    public function validate() {
        $this->validate_status = TRUE; // TODO
    }

    private function check_obj_create() {
        return TRUE; # TODO
    }

    public function logout() {
        session_destroy();
    }

    public function create() {
        $response = new Response();
        if($this->validate_status){
            $address = new AddressCreate(
                $this->address_city,
                $this->address_postal_code,
                $this->address_address,
                $this->address_country
            );

            $address->validate();
            $address->create();

            # TODO check create

            if($address->last_response->status == "OK"){
                $address_id = $address->last_response->last_id;

                $password = password_hash($this->user_password_1, PASSWORD_BCRYPT);
                $sql_types = [
                    'name' => $this->user_name, 
                    'surname' => $this->user_surname, 
                    'email' => $this->user_email, 
                    'password' => $password,
                    'address_id' => $address_id,
                    'firm_id' => $this->user_firm_nip
                ];

                $query = "INSERT INTO users (user_name, user_surname, user_email, user_password, user_firm_id, user_address_id)
                        VALUES(:name, :surname, :email, :password, :firm_id, :address_id)";

                $result = $GLOBALS['database']->make_query($query, $sql_types);
                $last_id = $GLOBALS['database']->get_last_insert();
                
                if($this->check_obj_create($last_id)){
                    $response->last_id = $last_id;
                } else {
                    $response->set_invalid();
                }

                $this->last_response = $response;

            } else {
                $response->set_invalid();
            }
        } else {
            $response->set_invalid(); # TODO response here
        }
    }
}