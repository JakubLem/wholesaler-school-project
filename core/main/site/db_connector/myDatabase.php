<?php

class ConnectionData {

    public $dbsname;
    public $dbusername;
    public $dbpassword;
    public $dbname;

    public function __construct($dbsname, $dbusername, $dbpassword, $dbname) {
        $this->dbsname = $dbsname;
        $this->dbusername = $dbusername;
        $this->dbpassword = $dbpassword;
        $this->dbname = $dbname;
    }
}

class MyDatabase {
    public $data;
    public $conn;
    public $valid;
    public $last_response;

    public function close_connection() {
        $this->conn->close();
    }

    private function check_connection() {
        if(mysqli_connect_errno()){
            $this->valid = FALSE;
        } else {
            $this->valid = TRUE;
        }
    }

    public function __construct($dbsname, $dbusername, $dbpassword, $dbname) {
        $this->data = new ConnectionData($dbsname, $dbusername, $dbpassword, $dbname);
        $this->conn = mysqli_connect($dbsname, $dbusername, $dbpassword, $dbname);
        $this->check_connection();
        $this->close_connection();
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
        if($this->valid) {
            if($this->sql_request_validation($sql_request)) {
                $this->last_response = $this->conn->query($sql_request);
            } else {
                throw new Exception("Invalid query");
            }
        } else {
            throw new Exception("No connection to database");
        }
        
    }

    public function get_last_response() {
        return $this->last_response;
    }

    public function get_connection() {
        $this->conn = mysqli_connect(
            $this->data->dbsname, 
            $this->data->dbusername, 
            $this->data->dbpassword, 
            $this->data->dbname
        );
        $this->check_connection();
    }
}
