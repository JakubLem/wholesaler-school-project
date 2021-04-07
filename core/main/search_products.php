<?php
require_once('connect_db.php');
require_once('forms/session/start.php');
$_SESSION['search_param'] = $_POST['search_param'];
header("Location: ./products.php");
