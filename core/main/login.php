<form name="login-form" class="register-form-form-parent" action="forms/user_login_form.php" method="post" onsubmit="return login_validate()">
    <input class="register-form-form" type="email" id="login_user_email" name="login_user_email" placeholder="Adres email">
    <input class="register-form-form" type="password" id="login_user_password" name="login_user_password" placeholder="Hasło">
    <input class="register-form-form" type="submit" value="Logowanie">
    <p id="login_error_response"></p>
</form>
<script src="scripts/validators/functions.js"></script>
<script src="scripts/validators/login.js"></script>
