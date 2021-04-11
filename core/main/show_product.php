<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
require_once('connect_db.php');
require_once('forms/session/start.php');
if(isset($_GET['product_name'])){
    $_SESSION['search_param'] = $_GET['product_name'];
}
header("Location: ./products.php");