<?php

class Validation {
    public $checker;
    public $message;

    public function __construct($checker, $message = "") {
        $this->checker = $checker;
        $this->message = $message;
    }
}

require_once('env_validation.php');





function validate() {
    try {
        validate_env();
    } catch (Exception $e) {
        $result_validation = new Validation(FALSE, $e->getMessage());
        return $result_validation;
    }
    $result_validation = new Validation(TRUE);
    return $result_validation;
}