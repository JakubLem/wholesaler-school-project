<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
require_once('connect_db.php');
require_once('forms/session/start.php');

$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
require_once('forms/classes/Order.php');
$user_id = $_GET['user_id'];

$order = new Order;
$order->make_order($user_id);
header("Location: account.php");