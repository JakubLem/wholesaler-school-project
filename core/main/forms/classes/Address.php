<?php

require_once('classes/Response.php');
class AddressCreate{
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
        $this->validate_status = TRUE;
    }

    public function create() {
        $response = new Response();
        if($this->validate_status){
            $sql_types = ['city' => $this->address_city, 
                'address' => $this->address_address, 
                'postal_code' => $this->user_email, 
                'country' => $this->address_city
            ];
            $query = "INSERT INTO address (address_city, address_address, address_postal_code, address_country)
                      VALUES(:city, :address, :postal_code, :country)";
            echo $query;
            $result = $GLOBALS['database']->make_query($query, $sql_types);
            $this->last_response = $result;
            foreach($result as $row) {
                print_r($row);
            }
            $this->last_response = $response;
        }
    }
}