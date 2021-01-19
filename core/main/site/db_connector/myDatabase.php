<?php

class MyDatabase {
    public $conn;
    public $valid;
    public $last_response;

    private function check_connection() {
        if(mysqli_connect_errno()){
            $this->valid = FALSE;
        } else {
            $this->valid = TRUE;
        }
    }

    public function __construct($dbsname, $dbusername, $dbpassword, $dbname) {
        $this->conn = mysqli_connect($dbsname, $dbusername, $dbpassword, $dbname);
        $this->check_connection();
    }

    private function sql_request_validation($sql_request) {
        $invalid_array = array(
            'DROP',
        );
        
        foreach ($invalid_array as &$value) {
            if(strpos($sql_request, $value) !== false){
                return FALSE; 
            }
        }
        return TRUE;
    }


    public function make_query($sql_request) {
        if($this->sql_request_validation($sql_request)) {
            $this->last_response = $this->conn->query($sql_request);
        } else {
            throw new Exception("Invalid query");
        }
    }
}