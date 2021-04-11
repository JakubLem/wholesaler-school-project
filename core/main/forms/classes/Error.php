<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
class Error {
    public $key;
    public $code;
    
    public function __construct($key, $code) {
        $this->key = $key;
        $this->code = $code;
    }
}
