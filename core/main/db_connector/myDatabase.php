<?php
// @include_once('db_connector/db_connector.php');
@include_once('connect_env.php');
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


    public function get_connection($data) {
        try {            
            $host=$data['HOST'];
            $dbusername=$data['USERNAME'];
            $dbpassword=$data['PASSWORD'];
            $dbname=$data['DBNAME'];

            $this->conn = new PDO('mysql:dbname='.$dbname.';host='.$host.';charset=utf8',
                $dbusername,
                $dbpassword
            );
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->check_connection();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
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
    
    public function make_query($sql_request, $types) {
        $this->check_connection();
        if($this->valid) {
            if($this->sql_request_validation($sql_request)) {
                $sql = $this->conn->prepare($sql_request);
                $sql->execute($types);
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);
                return $result;
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

    public function check_valid() {
        if($this->valid) {
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    }

    public function get_last_insert() {
        return $this->conn->lastInsertId();
    }
}
