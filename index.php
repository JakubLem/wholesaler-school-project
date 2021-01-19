<?php
    include_once(__DIR__ . '/vendor/autoload.php');
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    include_once(__DIR__ . '/core/run/validation.php');
    $validate_result = validate();
    if(! $validate_result->checker) {
        echo "VALIDATION ERROR: <br>";
        echo $validate_result->message;
        exit();
    }
    require_once(__DIR__ . '/core/main/site/main.php');
