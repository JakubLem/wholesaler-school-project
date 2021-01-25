<?php

    include_once('../../vendor/autoload.php');
        
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $GLOBALS['env'] = $_ENV;

    include_once('../run/validation.php');
    $validate_result = validate();
    if(! $validate_result->checker) {
        echo "VALIDATION ERROR: <br>";
        echo $validate_result->message;
        exit();
    } else {
        echo "OK";
    }