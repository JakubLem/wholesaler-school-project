<?php

class Response {
    public $response_code;
    public $message = array();
    public $status;

    public function __construct() {
        $this->status = 'OK';
    }

    public function set_status($status) {
        $this->status = $status;
    }
}
