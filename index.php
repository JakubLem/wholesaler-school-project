<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once(__DIR__ . '/vendor/autoload.php');
        
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        require_once(__DIR__ . '/core/run/validation.php');

        $validate_result = validate();
        if(! $validate_result->checker) {
            echo "VALIDATION ERROR <br>";
            echo $validate_result->message;
            exit();
        }
        echo "udalo sie";

        require_once(__DIR__ . '/core/main/site/main.php')
    ?>
</body>
</html>