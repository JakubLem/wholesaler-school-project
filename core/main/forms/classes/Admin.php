<?php

require_once('Response.php');

class Admin{
    public $identifier;

    public $admin_name;
    public $admin_surname;
    public $admin_email;
    public $admin_password_1;

    public $validate_status = FALSE;
    public $last_response;

    public function validate() {
        $response = new Response();
        $data_validate_status = true;

        $sql_types = ['email' => $this->admin_email];
        $query = "SELECT * FROM admins WHERE admin_email = :email";

        $result = $GLOBALS['database']->make_query($query, $sql_types);
        print_r($result);

        if(!empty($result)) {
            $response->set_invalid();
            $response->code = "EMAIL_EXISTS";
        }

        $this->last_response = $response;
        $this->validate_status = $data_validate_status;
    }
    
    public function login() {
        $response = new Response();

        if(!filter_var($this->admin_email, FILTER_VALIDATE_EMAIL)) {
            $response->set_invalid();
            $response->code = "invalid_email";
        } else {        

            $sql_types = ['email' => $this->admin_email];
            $query = "SELECT admin_id, admin_password FROM admins WHERE admin_email = :email";

            $result = $GLOBALS['database']->make_query($query, $sql_types);

            if(empty($result)) {
                $response->set_invalid();
                $response->code = "null_email";
            } else {
                if(password_verify($this->admin_password_1, $result[0]['admin_password'])){
                    $this->identifier = $result[0]['admin_id'];
                } else {
                    $response->set_invalid();
                    $response->code = "invalid_password";
                }
            }  
        }
        $this->last_response = $response;
    }

    public function create() {
        $response = new Response();
        if($this->validate_status){
            $password = password_hash($this->admin_password_1, PASSWORD_BCRYPT);
            $sql_types = [
                'name' => $this->admin_name, 
                'surname' => $this->admin_surname, 
                'email' => $this->admin_email, 
                'password' => $password,
            ];
            $query = "INSERT INTO admins (admin_name, admin_surname, admin_email, admin_password)
                    VALUES(:name, :surname, :email, :password)";
            $result = $GLOBALS['database']->make_query($query, $sql_types);
            $last_id = $GLOBALS['database']->get_last_insert();
            
            $response->last_id = $last_id;
            $this->last_response = $response;
        } else {
            $response->set_invalid();
        }
    }

    public function update_data() {
        $sql_types = ['id' => $this->identifier];
        $query = "SELECT admin_name, admin_surname, admin_email FROM admins WHERE admin_id = :id";
        $result = $GLOBALS['database']->make_query($query, $sql_types);
        $this->admin_name = $result[0]['admin_name'];
        $this->admin_surname = $result[0]['admin_surname'];
        $this->admin_email = $result[0]['admin_email'];

        return true;
    }

    public function change_password($new_password) {
        $password = password_hash($new_password, PASSWORD_BCRYPT);
        $sql_types = [
            'id' => $this->identifier,
            'password' => $password,
        ];

        $query = "UPDATE admins SET admin_password = :password WHERE admin_id = :id";
        $result = $GLOBALS['database']->make_query($query, $sql_types);
        print_r($result);
        return true;
    }
}

function translate_db_result($db_result) {
    $result = array();
    foreach ($db_result as &$obj) {
        $admin = new Admin;
        $admin->identifier = $obj['admin_id'];
        $admin->admin_name = $obj['admin_name'];
        $admin->admin_surname = $obj['admin_surname'];
        $admin->admin_email = $obj['admin_email'];
        array_push($result, $admin);
    }
    return $result;
}

function get_all_admins() {
    $sql_types = [];
    $query = "SELECT * FROM admins";
    $result = $GLOBALS['database']->make_query($query, $sql_types);
    return translate_db_result($result);
}