<?php
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
@include_once(__DIR__. '/top.php');
echo "XD";

require_once('forms/classes/Product.php');
$products = get_all_products();
print_r($products);






@include_once(__DIR__. '/stop.php');