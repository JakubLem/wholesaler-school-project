<?php

function validate_env() {

    $env_exception = "VALIDATE ENV ERROR :: ";

    $valid_env = array(
        'DATABASE_NAME',
        'TEST',
    );
    
    foreach ($valid_env as &$value) {
        if(!array_key_exists($value, $_ENV)) {
            $env_exception .= $value;
            $env_exception .= "does not exist in .env file";
            throw new Exception($env_exception);
        }
    }
}
