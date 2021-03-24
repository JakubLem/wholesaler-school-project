<?php

require_once('connect_db.php');
require_once('forms/session/start.php');


if(isset($_GET['id']) && isset($_SESSION['user_identifier'])){
    echo 'todo';
}

$_SESSION['cart_important'] = true; // TODO WSP-36
header("Location: account.php");