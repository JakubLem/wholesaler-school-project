<?php
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    
} else {
    header("Location: ./admin.php");
}
?>
