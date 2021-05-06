<?php
// | school project | Jakub Lemiesiewicz |
// | Zespół Szkół Komunikacji w Poznaniu |
$GLOBALS['header'] = 5;
@include_once(__DIR__. '/start.php');
?>
<link rel="stylesheet" href="/wholesaler-school-project/core/main/styles/account.css">
<script>
let old_class_name = "register-form-form";
let new_class_name = "register-form-form-invalid";
</script>
<script src="scripts/red_form.js"></script>

<?php
@include_once(__DIR__. '/top.php');
?>

<form name="edit-password-form" class="register-form-form-parent" action="forms/user_edit_password_form.php" method="post" onsubmit="return change_password_validate()">
    <input class="register-form-form" id="user_old_password" type="password" name="user_old_password" placeholder="Stare hasło" onclick="reset_input(id)">
    <input class="register-form-form" id="user_new_password" type="password" name="user_new_password" placeholder="Nowe hasło" onclick="reset_input(id)">
    <input class="register-form-form" id="user_new_password_re" type="password" name="user_new_password_re" placeholder="Powtórz hasło" onclick="reset_input(id)">
    <input class="register-form-form" type="submit" value="Zmień hasło">
    <div class="register_false">
        <p id="register_error_response"></p>
    </div>
<form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/edit_password.js"></script>
