<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
class Response {
    public $last_id;
    public $message = array();
    public $status;
    public $code;

    public function __construct() {
        $this->status = 'OK';
    }

    public function set_status($status) {
        $this->status = $status;
    }

    public function set_invalid() {
        $this->status = "INVALID";
    }
}
