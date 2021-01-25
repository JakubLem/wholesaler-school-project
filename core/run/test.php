<?php

    include_once(__DIR__ . '/validation.php');
    $validate_result = validate();
    if(! $validate_result->checker) {
        echo "VALIDATION ERROR: <br>";
        echo $validate_result->message;
        exit();
    } else {
        echo "OK";
    }