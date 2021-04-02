<?php

require_once('connect_db.php');
require_once('forms/session/start.php');

if(isset($_GET['id']) && isset($_SESSION['user_identifier'])){
    $product_id = $_GET['id'];
    $user_id = $_SESSION['user_identifier'];

    $sql_types = ['user_id' => $user_id, 'product_id' => $product_id];
    $query = "DELETE FROM cart WHERE product_id = :product_id AND user_id = :user_id";

    $db_result = $GLOBALS['database']->make_query($query, $sql_types);
}
$_SESSION['cart_important'] = true;
header("Location: account.php");
