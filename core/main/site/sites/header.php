<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    testtest
    <header></header>
    testtest
    <?php
        $GLOBALS['db']->make_query("SELECT * FROM olejki");
        $result = $GLOBALS['db']->get_last_response();
        while($row = $result->fetch_assoc()) {
            print_r($row);
            echo "<br>";
        }
    ?>
</body>
</html>