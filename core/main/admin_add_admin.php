<?php
$GLOBALS['header'] = 1;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once('connect_db.php');
@include_once('admin_header.php');
if(isset($_SESSION['admin-login'])){
    ?>
        <form name="register-form" class="register-form-form-parent" action="forms/admin_create_form.php" method="post" onsubmit="return register_validate()">
            <input class="register-form-form" id="user_name" type="text" name="user_name" placeholder="Imię" value="" onclick="reset_input(id)">
            <input class="register-form-form" id="user_surname" type="text" name="user_surname" placeholder="Nazwisko" value="" onclick="reset_input(id)">
            <input class="register-form-form" id="user_email" type="text" name="user_email" placeholder="Adres email" onclick="reset_input(id)">
            <input class="register-form-form" id="user_password_1" type="password" name="user_password_1" placeholder="Hasło" onclick="reset_input(id)">
            <input class="register-form-form" id="user_password_2" type="password" name="user_password_2" placeholder="Hasło" onclick="reset_input(id)">
            <input class="register-form-form" type="submit" value="Dodaj administratora">
            <div class="register_false">
                <p id="register_error_response"></p>
            </div>
        <form>
        <script src="scripts/validators/functions.js"></script>
        <script src="scripts/validators/register.js"></script>
    <?php
} else {
    header("Location: ./admin.php");
}
?>
