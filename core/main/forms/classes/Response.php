<?php

class Response {
    public $message = array();
    public $status;

    public function __construct() {
        $this->status = 'OK';
    }

    public function set_status($status) {
        $this->status = $status;
    }
}
