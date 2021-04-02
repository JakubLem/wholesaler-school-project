<?php

require_once('classes/Response.php');
class AddressCreate{
    public $identifier;

    public $address_city;
    public $address_postal_code;
    public $address_address;
    public $address_country;

    public $last_response;


    public function __construct(
        $address_city,
        $address_postal_code,
        $address_address,
        $address_country
    ) {
        $this->address_city = $address_city;
        $this->address_postal_code = $address_postal_code;
        $this->address_address = $address_address;
        $this->address_country = $address_country;
    }

    public function validate() {
        $this->validate_status = TRUE; // TODO
    }

    public function check_obj_create($identifier) {
        return TRUE; // TODO
    }

    public function create() {
        $response = new Response();
        if($this->validate_status){
            $sql_types = [
                'city' => $this->address_city, 
                'address' => $this->address_address, 
                'postal_code' => $this->address_postal_code, 
                'country' => $this->address_city
            ];

            $query = "INSERT INTO address (address_city, address_address, address_postal_code, address_country)
                      VALUES(:city, :address, :postal_code, :country)";

            $result = $GLOBALS['database']->make_query($query, $sql_types);
            $last_id = $GLOBALS['database']->get_last_insert();

            if($this->check_obj_create($last_id)){
                $response->last_id = $last_id;
            } else {
                $response->set_invalid();
            }

            $this->last_response = $response;  
                      
        }
    }
}