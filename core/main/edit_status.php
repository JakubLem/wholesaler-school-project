<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 2;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    $_SESSION['order_id'] = $_GET['order_id'];
    ?>
        <form name="register-form" class="register-form-form-parent" action="forms/edit_order_status_form.php" method="post">
            <input class="register-form-form" id="new_status" type="text" name="new_status" placeholder="Nowy status" value="" onclick="reset_input(id)">
            <input class="register-form-form" type="submit" value="Zapisz">
        <form>
        <script src="scripts/validators/functions.js"></script>
    <?php
} else {
    header("Location: ./admin_orders.php");
}
?>
