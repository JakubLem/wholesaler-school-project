<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 0;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');

if(isset($_SESSION['admin-login'])){
    if(isset($_SESSION['register_ok'])) {
        if($_SESSION['register_ok'] == "OK") {
            ?>
                <div class="register_ok">
                    <h2>Poprawnie dodano administratora!</h2>
                </div>
            <?php
        } else {
            ?>
                <div class="register_false">
                    <h2>Błędne dane w formularzu!</h2>
                </div>
            <?php
        }
        unset($_SESSION['register_ok']);
    }
} else {
    header("Location: ./admin.php");
}
?>
