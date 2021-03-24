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

    public function get_user_name() {
        return $this->user_name;
    }
    
    public function login() {
        $response = new Response();

        if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL)) {
            $response->set_invalid();
            $response->code = "invalid_email";
        } else {        

            $sql_types = ['email' => $this->user_email];
            $query = "SELECT user_id, user_password FROM users WHERE user_email = :email";

            $result = $GLOBALS['database']->make_query($query, $sql_types);

            if(empty($result)) {
                $response->set_invalid();
                $response->code = "null_email";
            } else {
                if(password_verify($this->user_password_1, $result[0]['user_password'])){
                    $this->identifier = $result[0]['user_id'];
                } else {
                    $response->set_invalid();
                    $response->code = "invalid_password";
                }
            }  
        }
        $this->last_response = $response;
    }

    public function update_data() {
        $sql_types = ['id' => $this->identifier];
        $query = "SELECT user_name, user_surname, user_email, user_firm_id, user_address_id FROM users WHERE user_id = :id";
        
        $result = $GLOBALS['database']->make_query($query, $sql_types);

        $this->user_name = $result[0]['user_name'];
        $this->user_surname = $result[0]['user_surname'];
        $this->user_email = $result[0]['user_email'];

        $this->user_firm_nip = $result[0]['user_firm_id'];

        $sql_types = ['id' => $result[0]['user_address_id']];
        $query = "SELECT * FROM address WHERE address_id = :id";

        $result = $GLOBALS['database']->make_query($query, $sql_types);
        print_r($result);

        $this->address_address = $result[0]['address_address'];
        $this->address_city = $result[0]['address_city'];
        $this->address_country = $result[0]['address_country'];
        $this->address_postal_code = $result[0]['address_postal_code'];



        return true;
    }

    public function validate() {
        $response = new Response();
        $data_validate_status = true;

        $sql_types = ['email' => $this->user_email];
        $query = "SELECT * FROM users WHERE user_email = :email";

        $result = $GLOBALS['database']->make_query($query, $sql_types);
        print_r($result);

        if(!empty($result)) {
            $response->set_invalid();
            $response->code = "EMAIL_EXISTS";
        }

        $this->last_response = $response;
        $this->validate_status = $data_validate_status;
    }

    private function check_obj_create() {
        return TRUE; # TODO
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
                
                if($this->check_obj_create($last_id)) {
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

    public function account_view() {
        $result =  array(
            "user_name"  => $this->user_name,
            "user_surname" => $this->user_surname,
            "user_email" => $this->user_email,
            "address_city" => $this->address_city,
            "address_address" => $this->address_address,
            "address_postal_code" => $this->address_postal_code,
            "address_address_country" => $this->address_country,
            "user_firm_nip" => $this->user_firm_nip
        );
        return $result;
    }
}
