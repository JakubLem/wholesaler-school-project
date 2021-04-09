<?php
$GLOBALS['header'] = 1;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/products.css">
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<?php
@include_once('connect_db.php');
@include_once('admin_start_header.php');
?>

<form name="login-form" class="register-form-form-parent" action="forms/admin_login_form.php" method="post" onsubmit="return login_validate()">
    <input class="register-form-form" type="email" id="login_user_email" name="login_user_email" placeholder="Adres email">
    <input class="register-form-form" type="password" id="login_user_password" name="login_user_password" placeholder="Hasło">
    <input class="register-form-form" type="submit" value="Logowanie">
    <p id="login_error_response"></p>
</form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/login.js"></script>

<form name="register-form" class="register-form-form-parent" action="forms/admin_create_form.php" method="post" onsubmit="return register_validate()">
    <input class="register-form-form" id="user_name" type="text" name="user_name" placeholder="Imię" value="" onclick="reset_input(id)">
    <input class="register-form-form" id="user_surname" type="text" name="user_surname" placeholder="Nazwisko" value="" onclick="reset_input(id)">
    <input class="register-form-form" id="user_email" type="text" name="user_email" placeholder="Adres email" onclick="reset_input(id)">
    <input class="register-form-form" id="user_password_1" type="password" name="user_password_1" placeholder="Hasło" onclick="reset_input(id)">
    <input class="register-form-form" id="user_password_2" type="password" name="user_password_2" placeholder="Hasło" onclick="reset_input(id)">
    <input class="register-form-form" type="submit" value="Rejestrajca">
    <div class="register_false">
        <p id="register_error_response"></p>
    </div>
<form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/register.js"></script>

<?php
print_r($_SESSION);
?>