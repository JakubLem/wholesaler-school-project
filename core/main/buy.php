<?php

require_once('connect_db.php');
require_once('forms/session/start.php');


if(isset($_GET['id']) && isset($_SESSION['user_identifier'])){
    $query = "INSERT INTO cart (user_id, product_id) VALUES (".$_SESSION['user_identifier'].", ".$_GET['id'].");";
    $db_result = $GLOBALS['database']->make_query($query, []);
}

header("Location: products.php");
